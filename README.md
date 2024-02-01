# ساخت فرآیند دریافت اطلاعات پست مورد نظر بر اساس ID آن به همراه تمام اطلاعات متصل به آن

###### برای اینکه بخواهیم تمام جزئیات یک پست را دریافت کنیم، لازم است ابتدا route آن را بسازیم.
```bash
Route::get('view-post/{post}', [PostController::class, 'postDetail'])->middleware(['can:' . Permissions::VIEW_ANY_POST]);
```
###### مسیر خود را از نوع get می سازیم و به تابع postDetail در PostController ارجاع می دهیم و سطح دسترسی VIEW_ANY_POST را بر روی آن تنظیم می کنیم که کاربرانی که این دسترسی را دارند مجاز به دیدن آن باشند. حال نوبت آن است تا وارد PostController شده تا تابع postDetail را بنویسیم.
```bash
public function postDetail(Post $post)
{
    $query = Post::query()
        ->select([
            'id',
            'user_id',
            'title',
            'description',
            'created_at',
            'updated_at',
            'up_vote_count',
            DB::raw('ST_X(location::geometry) AS latitude'),
            DB::raw('ST_Y(location::geometry) AS longitude')
        ])
        ->with('media')
        ->with('user')
        ->with('user.media')
        ->where('id', $post->id)
        ->first();
    return $this->successResponse([
        'post' => $query
    ], 200);
}
```
###### تابع را ساخته و مدل Post را در ورودی به آن می دهیم تا برای ما، post مورد نظر را پیدا کند. بعد در تابع شروع می کنیم به ساخت یک query بر روی مدل Post و مواردی که می خواهیم را select می کنیم و داده های طول و عرض جغرافیایی را با استفاده از postgis تبدیل می کنیم و می یابیم. همراه query از طریق ORM در خواست می کنیم media و اطلاعات user و همچنین media ای که برای user قرار داده شده به ما تحویل داده شود، دقت کنید که آخر کار شرط می کنیم که حتما ID ای که انتخاب می کنی با ID پست دریافتی ما یکی باشد، در انتها هم آن را first می کنیم تا یک object به ما تحویل دهد. در انتها یک پاسخ مثبت نسبت به درخواست کاربر همراه با داده دریافتی خود باز می گردانیم.
###### وارد فایل api.yaml می شویم و ساختار ظاهر آن را می سازیم.
```bash
/api/view-post/{post}:
    get:
      tags:
        - Post
      summery: view post detail
      description: user can see post detail
      parameters:
        - name: post
          in: path
          description: Post ID
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
###### وارد paths شده و path خود را مطابق سرور می نویسیم و نوع آن را get می گذاریم و به tag مورد نظر خود یعنی مقدار post را می دهیم تا در جای درست سازماندهی شود. برای  اینکه شناسه post را ارسال کنیم بخش پارامتر را باز می کنیم و هم نام متغیر خود در path به آن اشاره می کنیم، توضیحی برای آن می گذاریم و schema آن را مشخص می کنیم، پر کردن آن را هم اجباری می نماییم. باز هم بخش پاسخ را مجدد می نویسیم و در انتها security را فعال می کنیم. حال همه چی برای دریافت اطلاعات یک پست آماده است.

