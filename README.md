# ساخت بخش دریافت پست ها به صورت صفحه بندی شده برای مدیر سایت با بررسی نقش آن

###### برای پیاده سازی مکانیزم دریافت پست ها لازم است وارد api.php شده و یک route از نوع get بسازیم.
```bash
Route::get('all-posts-for-admin', [PostController::class, 'allPostsForAdmin'])->middleware(['can:'.Permissions::READ_ANY_POST]);
```
###### مسیر را به گونه ای می سازیم که اگر درخواست داده شد، وارد PostController شده و تابع allPostsForAdmin را اجرا کند. برای اینکه جلو کاربر های غیر admin را بگیریم و امنیت این مسیر را کنترل کنیم، به آن دسترسی READ_ANY_POST را می دهیم، چون فقط مدیر این دسترسی را دارد.

###### وارد PostController شده و تابع allPostsForAdmin را می نویسیم.
```bash
public function allPostsForAdmin()
{
    $query = Post::query()
        ->select([
            'id',
            'user_id',
            'title',
            'description',
            DB::raw('ST_X(location::geometry) AS latitude'),
            DB::raw('ST_Y(location::geometry) AS longitude')
        ])
        ->with('media')
        ->with('user')
        ->orderBy('id', 'desc');
    $posts = $query->paginate(5);
    return $this->paginatedSuccessResponse($posts, 'posts');
}
```
###### در داخل تابع ابتدا یک query بر روی مدل Post اجرا می کنیم و ستون های مورد نظر خود را select می کنیم و ستون location را با استفاده از postgis تبدیل می کنیم به دو مقدار latitude و longitude و همراه هر query داده media و اطلاعات کامل user را می گیریم و به صورت نزولی بر اساس ID پست ها مرتب می کنیم، در انتها حاصل query را به صفحات 5 تایی تبدیل می کنیم و با استفاده از paginatedSuccessResponse به سوی درخواست دهنده ارسال می کنیم.
###### حال برای اینکه ظاهر کار موجود باشد و بشود درخواست داد و حاصل کار خود را دید، وارد فایل api.yaml شده و در بخش paths مسیر مورد نظر خود را می سازیم.
```bash
/api/all-posts-for-admin?page={page}:
    get:
      tags:
        - Post
      summery: get all post for admin
      description: get all posts data for admin
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
###### مسیر خود را مطابق سرور می سازیم و متغیر page را در آن می گذاریم تا بشود درخواست برای صفحات دیگر هم داد و tag آن را post می گذاریم تا در دسته بندی پست جای گیرد. برای مسیر خود خلاصه و توضیحات مورد نظر می نویسیم و متغیر page را به عنوان پارامتر می نویسیم و برایش توضیح در نظر می گیریم و schema آن معین می کنیم و allowEmptyValue را فعال می کنیم تا امکان خالی فرستادن فعال باشد. در انتها responses را می نویسیم و الگو دفعات گذشته استفاده می کنیم. برای اینکه سرور بتواند تشخیص دهد ما کاربر login شده هستیم و دسترسی admin داریم، بخش security را می نویسیم.
###### حال همه چی آماده است و می توان به عنوان مدیر سایت، پست ها را صفحه بندی مشاهده نمود.








