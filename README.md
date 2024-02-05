# اجرا apiResource و پیاده سازی middleware در آن و آماده سازی ساختار جهت دریافت نظر های یک پست به صورت صفحه بندی شده

###### برای اینکه بخواهیم ساختار comment را بسازیم، لازم است ابتدا یک controller بسازیم، دقت کنید که می شود از apiResource استفاده کرد. برای مطالعه بیشتر می توانید <a href="https://laravel.com/docs/10.x/controllers#api-resource-routes">Laravel API Resource Routes</a> را مطالعه کنید. برای اینکه بخواهیم یک apiResource برای comment خود بسازیم، دستور زیر را می زنیم.
```bash
php artisan make:controller CommentController --api
```
###### بعد اینکه این دستور را زدیم، حال می توانیم به صورت زیر در در api.php یک route از نوع resource بسازیم.
```bash
Route::apiResource('comments', CommentController::class);
```
###### ابتدا Route را نوشته و بعد :: باید نوع مسیر را apiResource بگذاریم. در داخل تابع جایگاه اول آدرس URL پایه این مسیر است و پارامتر دوم controller ی است که می خواهیم در صورت صدا شدن به آن ارجاع داده شود.
###### حال برویم سراغ CommentController تا کمی درباره آن صحبت کنیم. وقتی شما دستور ساخت controller را با --api می زنید، controller با ساختار زیر ساخته می شود.
```bash
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
```
###### تگ php باز می شود و namespace معین می شود و مثل همیشه Request در اول کار use می شود و یک کلاس به نام CommentController ساخته شده که از Controller ارث می برد، این بار یک تفاوت اساسی وجود دارد، داخل کلاس پر است. پنج تابع در اختیار ما قرار می گیرد که می توانیم از آن ها استفاده کنیم و نیاز نیست برای آن ها route جدیدی تعریف کنیم. مسیر عادی comments به تابع index ختم می شود که در آن می توان لیستی از نظر های خود را بر گردانیم. اگر مسیر comments با method غیر get یعنی post ارسال شود به تابع store ارجاع داده می شود. اگر از روش get ارسال شود ولی به مسیر comments/{comment} ارسال شود، آنگاه به تابع show فرستاده می شود. و اگر هم در مسیر comments/{comment}  باشد ولی روش ارسال put یا patch باشد به تابع update فرستاده می شود. و در نهایت اگر مسیر همان comments/{comment} باشد ولی روش ارسال delete باشد، آنگاه تابع destroy فرا خوانده می شود. حال ما می خواهیم برای کار خود، ابتدا ورود به controller را منوط به دسترسی READ_ANY_COMMENT قرار دهیم. یعنی اینکه کاربرانی که اجازه دیدن comment دارند می توانند به هر یک از تابع های این controller برسند. حال هر یک از تابع ها ممکن است برای خود قوانینی داشته باشند که به نوبت به آن هم می رسیم.
###### برای اجراء این مسئله، یک تابع __construct در اول controller می نویسیم.
```bash
public function __construct()
{
    $this->middleware([
        'can:' . Permissions::READ_ANY_COMMENT,
    ]);
}
```
###### در تابع __construct به صورت یک لیست، middleware هایی که مورد نظر ما است را می نویسیم تا در موقع رسیدن هر درخواست، یک بار آن را بررسی کند.
###### برای اینکه تابع کار کند، برای Permissions یک use نیاز داریم.
```bash
use App\Enum\Permissions;
```
###### حال نوبت آن رسیده است که از تابع index استفاده کنیم و ساختاری بسازیم تا همه comment های یک پست را دریافت کنیم.
```bash
public function index()
{
    $postID = request()->input('post');
    $query = Comment::query()
        ->select([
            'id',
            'user_id',
            'post_id',
            'parent_id',
            'child',
            'title',
            'text',
        ])
        ->where('post_id', $postID)
        ->where('parent_id', null)
        ->orderBy('id', 'desc');
    $comments = $query->paginate(5);
    return $this->paginatedSuccessResponse($comments, 'comments');
}
```
###### در ابتدا تابع از تابع request استفاده می کنیم و از route خود، مقدار داخل post را بر می داریم. سپس یک query بر روی مدل comment می گذاریم و مواردی که می خواهیم را select می کنیم. بعد از select شرط های خود را با where می نویسیم. اول اینکه مقدار post_id با شناسه ای که دریافت کرده ایم یکی باشد و دوم اینکه ستون parent_id آن null باشد، یعنی comment ریشه است و بر روی comment دیگری comment نخورده است. در انتها هم بر اساس ID کل داده های خود را به صورت نزولی مرتب می کنیم. حال که query ما کامل شد، آن را به صفحات 5 تایی تبدیل می کنیم و با استفاده از paginatedSuccessResponse به درخواست دهنده باز می گردانیم.
###### برای تابع index لازم است تا مدل comment را use کنیم.
```bash
use App\Models\Comment;
```
###### حال نوبت آن رسیده که وارد api.yaml شده و ساختار درخواست زدن را بسازیم.
```bash
/api/comments?post={post}:
    get:
      tags:
        - Comment
      summery: get all comments
      description: can get all comment with pagination
      parameters:
        - name: post
          in: path
          description: post ID
          schema:
            type: integer
          required: true
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
###### در بخش paths یک path برای comment مطابق سرور می سازیم و مقدار post را به صورت متغیر در آن قرار می دهیم، method اجرای این path را get می گذاریم و tag آن را comment در نظر می گیریم تا دسته بندی درست خود باشد، برای مسیر خود خلاصه و توضیحات می نویسیم و تکلیف پارامتر post را مشخص می کنیم. نوع آن را integer می گذاریم و پر کردن آن را اجبار می کنیم. responses را مثل گذشته می نویسیم و security را فعال می کنیم.
###### حال همه چی آماده است تا بخواهیم درخواست دهیم و comment های یک پست را ببینیم.


