# آموزش ساخت مکانیزم جست و جو پست بر اساس فاصله جغرافیایی به وسیله postgis و بازگرداندن به صورت صفحه بندی شده

###### برای ساختن مسیری برای دریافت پست ها نسبت به مکان جغرافیایی خاص، ابتدا وارد api.php شده و route خود را می نویسیم.
```bash
Route::get('search-post', [PostController::class, 'searchPost'])->middleware(['can:' . Permissions::VIEW_ANY_POST]);
```
###### برای route خود از method ساده get استفاده می کنیم و آن را ارجاع می دهیم به PostController که موقع اجرا، تابع searchPost خود را فرا بخواند، برای اینکه دسترسی را مدیریت کنیم، به این مسیر دسترسی VIEW_ANY_POST را می دهیم تا هر کس که login باشد و یک کاربر معمولی باشد، می تواند پست ها را بر اساس موقعیت جغرافیایی مورد نظر ببیند.

###### وارد PostController شده و تابع searchPost را می نویسیم.
```bash
public function searchPost()
{
    $latitude = request()->input('latitude');
    $longitude = request()->input('longitude');
    $distanceField = "ST_Distance(location::geometry, "
        . "ST_GeomFromText('Point(" . $latitude . " " . $longitude . ")', 4326)) AS distance";
    $query = Post::query()
        ->select([
            'id',
            'user_id',
            'title',
            'description',
            'up_vote_count',
            DB::raw('ST_X(location::geometry) AS latitude'),
            DB::raw('ST_Y(location::geometry) AS longitude'),
            DB::raw($distanceField),
        ])
        ->with('media')
        ->with('user')
        ->orderBy('distance');
    $posts = $query->paginate(5);
    return $this->paginatedSuccessResponse($posts, 'posts');
}
```
###### در پارامتر تابع موردی را دریافت نمی کنیم و وارد تابع می شویم. از طریق تابع request بررسی می کنیم و مقادیر latitude و longitude را در متغیر های خود ذخیره می کنیم. در مرحله بعدی با استفاده از ST_Distance در postgis به بررسی فاصله جغرافیایی می پردازیم و آن را به عنوان distance ذخیره می کنیم. برای مطالعه بیشتر می توانید <a href="https://postgis.net/docs/ST_Distance.html">ST_Distance</a> و <a href="https://postgis.net/docs/ST_GeomFromText.html">ST_GeomFromText</a> را مورد ارزیابی و بررسی قرار دهید. در گام بعدی بر روی Post یک جست و جو به وجود می آوریم و مواردی که از پست می خواهیم را select می کنیم، آخرین گزینه select را هم DB::raw($distanceField) می گذاریم. دقت کنید که متغیر distanceField یک string است که در آن یک دستور خام postgresql نوشته شده است، به همین دلیل آن را با DB::raw اجرا می کنیم و دقت کرده باشید انتهای distanceField ما نوشتیم AS distance که باعث می شود حاصل خروجی این جست و جو در ستونی به نام distance ذخیره شود که ربطی به مدل post ندارد، یعنی همچین ستونی در جدول پست نیست اما ما به صورت موقت آن را اضافه می کنیم. مرحله بعد همراه هر رکورد، media  و اطلاعات user را هم می گیریم و دستور می دهیم بر اساس ستون ساخته شده خود یعنی distance مرتب کن، چون تعیین نکردیم به عنوان سعودی یا نزولی مرتب شود، به صورت پیشفرض به صورت سعودی مرتب می شود. هر چقدر عدد distance کمتر باشد، یعنی اختلاف فاصله مکانی نسبت به طول و عرضی که ما ارسال دریافت کردیم، کمتر است. در انتها هم داده های دریافتی را به صورت صفحه بندی 5 تایی درست کرده و با paginatedSuccessResponse باز می گردانیم.

###### برای اینکه ظاهر کار را در swagger بسازیم وارد فایل api.yaml می شویم و در بخش paths، مسیر خود را مطابق سرور می نویسیم.
```bash
/api/search-post?page={page}&latitude={latitude}&longitude={longitude}:
    get:
      tags:
        - Post
      summery: view post detail
      description: user can see post detail
      parameters:
        - name: page
          in: path
          description: Page Number
          schema:
            type: integer
          allowEmptyValue: true
        - name: latitude
          in: path
          description: latitude
          schema:
            type: integer
          required: true
        - name: longitude
          in: path
          description: longitude
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
###### آدرس خود را می سازیم و در path متغیر page را می گذاریم تا بتوانیم به صفحه دلخواه خود دسترسی پیدا کنیم و به سرور اطلاع دهیم، چون نیاز است که طول و عرض جغرافیایی را به سرور دهیم، متغیر latitude و longitude را هم در path می نویسیم. نوع path را get می گذاریم و در دسته post قرار می دهیم. برایش خلاصه و توضیحات در نظر می گیریم و پارامتر های در path را تعریف می کنیم، اول page را می نویسیم و schema آن را integer در نظر می گیریم و اجازه خالی فرستادن را به آن می دهیم، مورد بعدی latitude و longitude است مه هر کدام را جداگانه می نویسیم و برای هر کدام توضیحی در نظر می گیریم و نوع آن را integer در نظر می گیریم و پر کردن آن را اجبار می کنیم. در مرحله بعد responses را مانند گذشته می نویسیم تا وضعیت 200 برای ما به نمایش در آید و در انتها login بودن خود را با security به سرور اعلام می کنیم.
###### حال همه چی آماده است تا بتوانیم پست ها را با توجه فاصله جغرافیایی خود دریافت کنیم.







