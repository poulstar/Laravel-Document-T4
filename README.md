# ساخت فرآیند دریافت تمام پست های مربوطه به خود، همراه مکانیزم افزودن پست به نام خود

###### برای شروع باید ابتدا وارد فایل api.php شده و route مربوط به گرفتن پست های خورد را بسازیم.
```bash
Route::get('my-posts', [PostController::class, 'myPosts'])->middleware(['can:'.Permissions::READ_MY_POST]);
```
###### یک route از نوع get می سازیم و آن را ارجاع می دهیم به تابع myPosts در PostController و بر روی آن دسترسی READ_MY_POST قرار می دهیم تا کاربرانی که دسترسی را دارند، بتوانند ببینند.
###### حال به سراغ PostController می رویم و تابع myPosts را می نویسیم.
```bash
public function myPosts()
{
    $query = Post::query()
        ->select([
            'id',
            'title',
            'description',
            'up_vote_count',
            DB::raw('ST_X(location::geometry) AS latitude'),
            DB::raw('ST_Y(location::geometry) AS longitude')
        ])
        ->with('media')
        ->orderBy('id', 'desc')
        ->where('user_id', '=', Auth::id());
    $posts = $query->paginate(5);
    return $this->paginatedSuccessResponse($posts, 'posts');
}
```
###### در تابع myPosts یک query از مدل Post به وجود می آوریم و مواردی که می خواهیم نشان دهیم را select می کنیم و برای تبدیل point به طول و عرض جغرافیایی از قائده postgis استفاده می کنیم. در کنار هر رکورد media را صدا می کنیم تا همراهش باشد و دستور می دهیم که پست ها را بر اساس ID نزولی مرتب کند و در کنار آن یک شرط می گذاریم که user_id هر پست با ID کاربر login شده برابر باشد. در نهایت نتیجه query را به صفحات 5 تایی تبدیل می کنیم و از طریق paginatedSuccessResponse به کاربر باز می گردانیم.
###### حال برای اینکه بخواهیم ظاهری به وجود آوریم تا بتوانیم از آن برای درخواست زدن استفاده کنیم، وارد فایل api.yaml شده و path آن را در بخش paths می سازیم.
```bash
/api/my-posts?page={page}:
    get:
      tags:
        - Post
      summery: get all post
      description: get my posts data
      parameters:
        - name: page
          in: path
          description: page number for pagination
          schema:
            type: integer
          allowEmptyValue: true
      responses:
        "200":
          description: Successful operation
          content:
            application/json:
              schema:
                $ref: "#/components/schemas/ApiResponse"
      security:
        - bearerAuth: []
```
###### برای  ساخت path، آدرس را مطابق  سرور می نویسیم و متغیر page را در آن قرار می دهیم. برای آن method مورد نظر یعنی get را می گذاریم و جز tag مربوطه خود یعنی post قرار می دهیم. برای path خود خلاصه و توضیحاتی می سازیم و در بخش پارامتر ها وضعیت page را مشخص می کنیم و توضیحی برای آن در نظر می گیریم . schema آن را تعیین کرده و اجازه خالی فرستادن را نیز فعال می کنیم. برای بخش responses هم مثل گذشته وضعیت 200 را مشخص می کنیم. برای درخواست زدن لازم است تا login بودن مشخص شود، از همین رو security را هم می نویسیم.
###### حال برای آماده کردن مکانیزم افزودن نیاز است باز route آن را بنویسیم، به همین دلیل وارد فایل api.php شده و قطعه کد زیر را می نویسیم.
```bash
Route::post('create-post', [PostController::class, 'createPost'])->middleware(['can:'.Permissions::CREATE_NEW_POST]);
```
###### برای ذخیره یک پست route از نوع get می سازیم و آن را ارجاع می دهیم به تابع createPost در PostController و برای جلوگیری از دسترسی غیر مجاز، CREATE_NEW_POST را بر روی آن تنظیم می کنیم.
###### حال نوبت آن است که وارد PostController شده و تابع را بنویسیم، اما چون میخ می خواهیم یک فرم ارسال کنیم ، ابتدا request آن را می سازیم.
```bash
php artisan make:request UserCreatePostRequest
```
###### وارد UserCreatePostRequest شده و ابتدا بخش authorize را آزاد می گذاریم تا احراز هویت انجام ندهد.
```bash
public function authorize(): bool
{
    return true;
}
```
###### برای بخش rules هم قوانینی که می خواهیم را می گذاریم تا ورودی های ما را بررسی کند.
```bash
public function rules(): array
{
    return [
        'title' => 'required|max:250',
        'description' => 'required|max:10000',
        'image' => 'required|image|mimes:gif,ico,jpg,jpeg,tiff,jpeg,png,svg',
        'latitude' => 'required|numeric|min:-90|max:90',
        'longitude' => 'required|numeric|min:-180|max:180',
    ];
}
```
###### سپس وارد PostController شده و تابع createPost را می سازیم.
```bash
public function createPost(UserCreatePostRequest $request)
{
    $data = $request->safe(['title', 'description', 'latitude', 'longitude']);
    $post = new Post([
        'title' => $data['title'],
        'description' => $data['description'],
        'location' => DB::raw("ST_GeomFromText('Point(" . $data['latitude'] . " " . $data['longitude'] . ")', 4326)")
    ]);
    $post->user()->associate(Auth::id());
    $post->save();
    $this->storePostMedia($request->file('image'), $post->id, Auth::id());
    if ($post) {
        return $this->successResponse([
            'message' => 'Post Created',
        ]);
    }
    return $this->failResponse();
}
```
###### برای تابع createPost از UserCreatePostRequest به عنوان request validator استفاده می کنیم و بعد اینکه در داده هایی که ارسال شده است، مشکلی نیست و با قواعد و قوانین ما مطابقت دارد، وارد تابع شده و داده های safe شده title، description، latitude و longitude را بر می داریم و به وسیله آن یک پست create می کنیم و آن را به کاربر login شده نسبت می دهیم. تصویری که ارسال شده را ذخیره می کنیم برای پست جاری و نتیجه را از طریق successResponse به کاربر اطلاع می دهیم، اگر با مشکل مواجه شد، با پیام شکست کاربر را مطلع می کنیم.
###### برای تابع createPost نیاز است UserCreatePostRequest را use کنیم.
```bash
use App\Http\Requests\UserCreatePostRequest;
```
###### حال برای کار خود لازم است تا ظاهر آن را در api.yaml بسازیم که بشود اجرا افزودن پست برای خود را انجام دهیم و نتیجه را باز بینی کنیم. از همین رو ابتدا در بخش components وارد شده و schema مربوط به افزودن پست را می سازیم.
```bash
CreatePost:
  type: object
  properties:
    title:
      type: string
    description:
      type: string
    image:
      type: string
      format: binary
    latitude:
      type: number
    longitude:
      type: number
```
###### الگو فرم CreatePost را می سازیم و نوع آن را object می گذاریم و مقادیر property های آن را متناسب با نیاز خود می نویسیم. حال نوبت آن است تا از schema خود در path استفاده کنیم.
```bash
/api/create-post:
    post:
      tags:
        - Post
      summery: Create a new Post
      description: User can be add new post for app
      requestBody:
        content:
          multipart/form-data:
            schema:
              $ref: "#/components/schemas/CreatePost"
      responses:
        "200":
          description: Successful operation
          content:
            application/json:
              schema:
                $ref: "#/components/schemas/ApiResponse"
      security:
        - bearerAuth: []
```
###### مسیر خود را مطابق الگو سرور در paths می نویسیم و method آن را post می گذاریم و tag آن را Post در نظر می گیریم و خلاصه و توضیحات مربوط به آن را برایش  می نویسیم. نوع requestBody را multipart/form-data می گذاریم و schema آن را به CreatePost نسبت می دهیم. responses را نیز با احتساب به الگو های گذشته مجدد می نویسیم و برای تایید login بودن ما و اثبات هویت خود، از security استفاده می کنیم.
