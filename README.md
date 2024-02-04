# ساخت ویرایش یک پست توسط مدیر سایت با بررسی نقش او در request

###### برای شروع وارد فایل api.php شده و route زیر را می نویسیم.
```bash
Route::post('update-post-by-admin/{post}', [PostController::class, 'updatePostByAdmin'])->middleware(['can:'.Permissions::UPDATE_ANY_POST]);
```
###### آدرس را از نوع post می سازیم و آن را ارجاع می دهیم به تابع updatePostByAdmin در PostController و بر روی آن سطح دسترسی UPDATE_ANY_POST را می گذاریم تا غیر admin نتواند از آن استفاده کند.
###### برای اینکه تابع updatePostByAdmin بنویسیم، ابتدا لازم است request آن را بسازیم تا داده های ارسالی را مدیریت کنیم.
```bash
php artisan make:request AdminUpdatePostRequest
```
###### در AdminUpdatePostRequest وارد تابع authorize می شویم و بررسی می کنیم که کاربر درخواست کننده مدیر است یا خیر، اگر مدیر بود اجازه ادامه کار می دهیم، در غیر این صورت، جلو او را می گیریم.
```bash
public function authorize(): bool
{
    if (Auth::user()->getRoleNames()[0] !== Roles::ADMIN) {
        return false;
    }else {
        return true;
    }
}
```
###### برای تابع authorize نیاز داریم تا موارد زیر را use کنیم.
```bash
use Illuminate\Support\Facades\Auth;
use App\Enum\Roles;
```
###### در بخش تابع rules قوانینی که می خواهیم اعمال شود را می نویسیم تا داده های ورودی را بررسی و از بروز خطا جلوگیری کند. دقت کنید  که چون عمل ویرایش را انجام می دهیم، nullable می گذاریم تا امکان خالی بودن فراهم شود.
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
###### حال نوبت آن است وارد PostController شده و تابع updatePostByAdmin را می نویسیم.
```bash
public function updatePostByAdmin(AdminUpdatePostRequest $request, Post $post)
{
    $data = $request->safe(['title', 'description', 'latitude', 'longitude']);
    if ($request->input('title'))
        $post->title = $data['title'];
    if ($request->input('description'))
        $post->description = $data['description'];
    if ($request->input('latitude') && $request->input('longitude'))
        $post->location = DB::raw("ST_GeomFromText('Point(" . $data['latitude'] . " " . $data['longitude'] . ")', 4326)");
    $post->update();
    if ($request->file('image')) {
        $this->storePostMedia($request->file('image'), $post->id, $post->user_id);
    }
    return $this->successResponse([
        'message' => 'Post Updated',
    ]);
}
```
###### در تابع AdminUpdatePostRequest را به عنوان پارامتر در نظر می گیریم تا داده های ورودی را بررسی کند و با قوانین ما مورد ارزیابی قرار دهد که اگر مجاز بود به ادامه کار برود. در مرحله بعد از مدل Post استفاده می کنیم تا داده مربوط به پست ما را بیابد.
###### وارد تابع شده و مقادیر safe شده title، description، latitude و longitude را بر می داریم و با شرط های خود بررسی می کنیم که آیا پر شده است یا خیر، که اگر پر شده بود، جای گذاری شود و در انتها دستور ویرایش صادر شود. بعد بررسی می کنیم آیا تصویری نیز ارسال شده است یا خیر، اگر ارسال شده بود، تصویر جدید  را برای پست ذخیره می کنیم. و در انتها با باز گرداندن پاسخ صحیح، درخواست دهنده را از وضعیت درخواستش آگاه می کنیم.
###### برای تابع updatePostByAdmin لازم است تا AdminUpdatePostRequest را use کنیم.
```bash
use App\Http\Requests\AdminUpdatePostRequest;
```
###### برای اینکه ظاهر مربوطه را داشته باشیم تا بتوانیم عمل ویرایش هر پستی را به وسیله نقش مدیر انجام دهیم، وارد فایل api.yaml شده و path مربوطه را در بخش paths می سازیم، دقت کنید که چون قبلا schema ای برای ویرایش یک پست ساخته بودیم و این ویرایش هم مانند آن است، از همان استفاده می کنیم.
```bash
/api/update-post-by-admin/{post}:
    post:
      tags:
        - Post
      summery: Update Post by admin
      description: Update any post by admin
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
###### مسیر را ساخته با توجه الگویی که در سرور وجود دارد و نیز متغیر پست را در آن قرار می دهیم تا بتوانیم ID را ارسال کنیم. نوع method را post می گذاریم و tag را در مجموعه post می گذاریم تا در دسته مربوطه خود قرار گیرد. برای مسیر خود خلاصه و توضیحات در نظر می گیریم و پارامتر post را می سازیم و توضیحی برای آن در نظر می گیریم و نوع آن را مشخص کرده و پر کردن آن را اجبار می کنیم. نوع requestBody را multipart/form-data می گذاریم تا بشود با فرم فایل ارسال نمود و فرم خود را به UpdatePost ارجاع می دهیم. بخش responses را نیز مانند گذشته می سازیم و برای اثبات admin بودن خود، بخش security را می نویسیم.
###### حال همه چی آماده است تا بخواهیم درخواست دهیم تا پست های موجود ویرایش شود.





