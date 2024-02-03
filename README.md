# ساخت فرآیند ویرایش پست های خود با توجه به حق مالکیت فرد نسبت به پست

###### برای اینکه بخواهیم ساختار ویرایش پست های هر کاربر را برایش فعال کنیم، ابتدا باید route آن را بنویسیم.
```bash
Route::post('update-my-post/{post}', [PostController::class, 'updateMyPost'])->middleware(['can:'.Permissions::UPDATE_MY_POST]);
```
###### یک route از نوع post می سازیم و به تابع updateMyPost در PostController ارجاع می دهیم و برای اینکه دسترسی آن را محدود کنیم، به آن دسترسی UPDATE_MY_POST می دهیم.
###### قبل اینکه وارد PostController شده تا تابع updateMyPost را بسازیم، ابتدا یک request برای ویرایش پست بسازیم.
```bash
php artisan make:request UserUpdatePostRequest
```
###### وقتی UserUpdatePostRequest را ساختیم، وارد آن شده و بخش authorize و بدون احراز هویتی، آن را تایید می کنیم.
```bash
public function authorize(): bool
{
    return true;
}
```
###### در بخش تابع rules نیز قوانینی که می خواهیم را می نویسیم، فقط برای تمام داده هایی که می آید، اجازه nullable را می دهیم تا اگر خالی بود، قوانین بررسی نشود.
```bash
public function rules(): array
{
    return [
        'title' => 'nullable|max:250',
        'description' => 'nullable|max:10000',
        'image' => 'nullable|image|mimes:gif,ico,jpg,jpeg,tiff,jpeg,png,svg',
        'latitude' => 'nullable|numeric|min:-90|max:90',
        'longitude' => 'nullable|numeric|min:-180|max:180',
    ];
}
```
###### وارد PostController شده و شروع می کنیم به نوشتن تابع updateMyPost تا بتوان پست های خود را ویرایش کنیم.
```bash
public function updateMyPost(UserUpdatePostRequest $request, Post $post)
{
    if ($post->user_id !== Auth::id()) {
        return $this->failResponse([], 403);
    }
    $data = $request->safe(['title', 'description', 'latitude', 'longitude']);
    if ($request->input('title'))
        $post->title = $data['title'];
    if ($request->input('description'))
        $post->description = $data['description'];
    if ($request->input('latitude') && $request->input('longitude'))
        $post->location = DB::raw("ST_GeomFromText('Point(" . $data['latitude'] . " " . $data['longitude'] . ")', 4326)");
    $post->update();
    if ($request->file('image')) {
        $this->storePostMedia($request->file('image'), $post->id, Auth::id());
    }
    return $this->successResponse([
        'message' => 'Post Updated',
    ]);
}
```
###### ابتدا برای بررسی داده های ارسالی کاربر، UserUpdatePostRequest را در بخش پارامتر های تابع می نویسیم و همچنین از Post استفاده کرده تا ID ارسالی را بررسی کرده و پست مورد نظر را شناسایی کند. وقتی کار  های اولیه تمام شد، وارد تابع شده و بررسی می کنیم آیا فردی که درخواست ویرایش داده، ID  کاربری اش با ID ای که روی پست ثبت شده یکی است یا خیر، اگر کاربر همان پست باشد کار ادامه می یابد، در غیر اینصورت پیام خطا عدم دسترسی می دهیم. در ادامه کار بررسی می کنیم آیا مقادیر مختلف پر هستند یا خیر، وقتی پر بود، همان مقدار در پست مقدار دهی می شود. برای طول و عرض جغرافیایی، پر بودن هر دو را همزمان شرط می کنیم، در انتها ویرایش می کنیم، اگر تصویری هم ارسال شده بود، دستور ذخیره آن را هم می دهیم. در انتها با  ارسال پیام موفقیت، نتیجه را به درخواست دهنده اطلاع می دهیم.
###### برای تابع updateMyPost نیاز داریم تا UserUpdatePostRequest را use کنیم.
```bash
use App\Http\Requests\UserUpdatePostRequest;
```
###### حال نوبت آن است که وارد فایل api.yaml شده و ظاهر را جهت ارسال درخواست ویرایش می کنیم. دقت کنید  ابتدا لازم است تا وارد components شده و schema مورد نظر خود را می سازیم.
```bash
UpdatePost:
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
###### وقتی schema را ساختیم، نوع آن را object می گذاریم و property های آن را مانند create post کی سازیم تا مقادیری که نیاز است ارسال کنیم را داشته باشیم.
###### وارد بخش paths شده و path ویرایش پست خود را می نویسیم.
```bash
/api/update-my-post/{post}:
    post:
      tags:
        - Post
      summery: Update Post
      description: Update my post
      parameters:
        - name: post
          in: path
          description: Post ID
          schema:
            type: integer
          required: true
      requestBody:
        content:
          multipart/form-data:
            schema:
              $ref: "#/components/schemas/UpdatePost"
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
###### آدرس path را مطابق الگو سرور می نویسیم و متغیر post را در آن می گذاریم تا بتوان به سمت سرور، ID پست را ارسال نمود. نوع path خود را post می گذاریم و tag را Post اختصاص می دهیم تا در دسته بندی مربوط خود قرار گیرد. خلاصه و توضیحات مورد نظر خود را می نویسیم و پارامتر post را می سازیم و نوع آن را integer می گذاریم و پر کردن آن را اجباری می کنیم. در بخش requestBody، محتوا را از نوع multipart/form-data می گذاریم تا وقتی به UpdatePost ارجاع می دهیم، امکان ارسال فایل وجود داشته باشد. بخش responses را هم مطابق گذشته می نویسیم و برای انکه اطلاعات login بودن ما با درخواست ارسال شود، security را فعال می کنیم.
###### حال همه چی آماده است تا بخواهیم پست خود را ویرایش کنیم.





