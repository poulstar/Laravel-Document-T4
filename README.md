# آموزش ساخت comment در apiResource و آموزش تغییر یکی از route ها و چگونگی انجام authorize بر اساس نوع درخواست برای request و همچنین نوشتن boot برای مدل comment

###### برای اینکه بخواهیم یک comment اضافه کنیم، لازم داریم تا ID پست را ارسال کنیم، اما موردی که هست، ما داریم از apiResource استفاده می کنیم و مسیر store چیزی تحت عنوان comment ندارد و ما قصد نداریم در فرمی که دریافت می کنیم یک input داشته باشیم که ID پست برای ما بیاید. به همین منظور ابتدا مسیر store را غیر فعال می کنیم، بعد مسیر جدید می سازیم و به apiResource ربط می دهیم.
```bash
Route::apiResource('comments', CommentController::class, [
    'except' => 'store'
]);
Route::post('comments/{post}/create',[CommentController::class,'store']);
```
###### با اضافه کردن پارامتر سوم به apiResource، می توانیم تعیین کنیم کدام مسیر های فعال یا غیر فعال باشند. بعد آن یک route می سازیم و از نوع post در نظر می گیریم و پایه URL آن را comments می گذاریم تا با URL مربوط با apiResource ما یکی باشد و بعد ادامه ساختار را متناسب با سلیقه خود منظم می کنیم و ارجاع می دهیم به تابع store در CommentController که عمل افزودن را  در آن انجام دهیم. 
###### قبل اینکه وارد CommentController بشویم، لازم داریم تا اول request خود را بسازیم.
```bash
php artisan make:request CommentRequest
```
###### حال که CommentRequest را ساختیم، در بخش authorize بررسی می کنیم اگر درخواست post باشد، کاربر دسترسی CREATE_ANY_COMMENT را دارد یا خیر.
```bash
public function authorize(): bool
{
    if ($this->isMethod('post')) {
        if (Auth::user()->hasPermissionTo(Permissions::CREATE_ANY_COMMENT)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
```
###### اگر دسترسی را داشت مقدار true بر می گردانیم تا کار ادامه پیدا کند، برای تابع authorize نیاز داریم تا موارد زیر را use کنیم.
```bash
use Illuminate\Support\Facades\Auth;
use App\Enum\Permissions;
```
###### بعد آن نوبت به آن می رسد که ما بخش rules را بنویسیم و این کار را فعلا برای حالت post می نویسیم، تا بعدا بتوانیم برای method های دیگر هم تصمیم بگیریم.
```bash
public function rules(): array
{
    if ($this->isMethod('post')){
        return [
            'parent_id' => 'nullable|numeric',
            'title' => 'required|min:3|max:100',
            'text' => 'required|min:3|max:10000',
        ];
    } else {
        return [];
    }
}
```
###### حال نوبت آن است تا CommentController شده و تابع store را می نویسیم.
```bash
public function store(CommentRequest $request, Post $post)
{
    $data = $request->safe(['parent_id', 'title', 'text']);
    $comment = new Comment([
        'user_id' => Auth::id(),
        'post_id' => $post->id,
        'parent_id' => $data['parent_id'],
        'title' => $data['title'],
        'text' => $data['text'],
    ]);
    if ($comment->save()) {
        return $this->successResponse([
            'message' => 'Your create Accepted',
        ], 200);
    } else {
        return $this->failResponse([
            'message' => 'Your Data have problem'
        ], 409);
    }
}
```
###### در اول تابع، پارامتر اول را با CommentRequest پر می کنیم تا شرایط و قوانین ما را طی کند و بعد بتواند به داخل تابع بیاید، همچنین پارامتر دوم را مدل post در نظر گرفتیم تا ID دریافتی را تبدیل به مدل ما کند و داده های پست را در اختیار ما بگذارد. حال که وارد تابع شدیم، موارد safe را برداشته و comment خود را با آن می سازیم، پس از آنکه ساخته شد، برای ذخیره شدن، شرط می گذاریم اگر فرآیند ذخیره شدن کامل شد، پیام موفقیت باز گرداند و در غیر این صورت پیام خطا باز گرداند.
###### برای تابع فوق لازم داریم تا موارد زیر را use کنیم.
```bash
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
```
###### نکته بعدی که حائز اهمیت است، باید توجه داشت که هر پست ما دارای یک  یا چند comment می تواند باشد، اما یک comment هم می تواند یک سری comment های زیر مجموعه داشته باشد که باز هم مال همان پست است، اما در جواب یا به عبارتی واکنش به یک comment ساخته شده است. در comment ما ستونی داریم که وضعیت child را مشخص می کند. اگر یک comment زیر مجموعه داشته باشد، مقدار child به true تغییر پیدا می کند. به عبارتی، اگر یک comment ساخته شود، باید بررسی شود آیا برای آن parent_id در نظر گرفته شده است یا خیر، که اگر در نظر گرفته شده بود، مقدار child را در parent تبدیل به true می کنیم. همین عمل در پاک شدن یک comment نیز بررسی می شود، با این تفاوت که اگر comment پاک شده دارای parent است و تعداد child ها هم در اثر پاک شدن کوچک تر از 1 شده است، در نتیجه مقدار child نظر parent را false می کنیم که یعنی دیگر نظر زیر مجموعه ندارد. از همین رو وارد مدل comment شده و برایش boot می نویسیم.
```bash
protected static function boot()
{
    parent::boot();
    Comment::created(function (Comment $comment) {
        if ($comment->parent_id) {
            $parentComment = $comment->parent;
            $parentComment->child = true;
            $parentComment->save();
        }
    });
    Comment::deleted(function (Comment $comment) {
        if ($comment->parent_id) {
            $parentComment = $comment->parent;
            if (count($parentComment->children) < 1) {
                $parentComment->child = false;
                $parentComment->save();
            }
        }
    });
}
```
###### بعد این مرحله نوبت آن می رسد در فایل api.yaml ظاهر اجرایی آن را بسازیم، به همین منظور اول وارد بخش components شده و در schemas نوع schema خود را می سازیم.
```bash
CreateComment:
    type: object
    properties:
      parent_id:
        type: number
      title:
        type: string
      text:
        type: string
```
###### برای نیاز خود، schema را می سازیم و نوع آن را object در نظر می گیریم و پارامتر های مورد نیاز خود را با نوع type آن می سازیم. بعد آن وارد paths شده و path مورد نظر خود را می سازیم.
```bash
/api/comments/{post}/create:
    post:
      tags:
        - Comment
      summery: Create Comment
      description: Create any Comment
      parameters:
        - name: post
          in: path
          description: Post ID
          schema:
            type: integer
          required: true
      requestBody:
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: "#/components/schemas/CreateComment"
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
###### مسیر را مطابق سرور می سازیم و متغیر post را در آن قرار می دهیم. ابتدا method آن را post می گذاریم و در دسته comment می گذاریم. برایش خلاصه و توضیحی در نظر می گیریم و شروع می کنیم به ساخت بخش پارامتر تا در آن نوع پارامتر را مشخص کنیم و پر کردن آن را اجباری در نظر بگیریم. چون در فرم خود فایل ارسال نمی کنیم، نوع requestBody را application/x-www-form-urlencoded در نظر می گیریم و به CreateComment ارجاع می دهیم تا فرم شکل بگیرد. بخش responses را نیز مانند گذشته می نویسیم و برای مسیر خود security را فعال می کنیم تا در بخش header، کلید امنیتی bearer ارسال شود.
###### حال همه چی برای استفاده ما جهت ثبت یک نظر بر روی هر پستی که می خواهیم آماده است.
