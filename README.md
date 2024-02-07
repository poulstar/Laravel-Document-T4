# آموزش کار با Feature Test و Unit Test در لاراول

###### انجام تست در لاراول به دو بخش تقسیم می شود، یکی Feature Test که می توانید در آن تک تک صفحات و ساختار هایی که ساخته اید را مورد ارزیابی قرار دهید. همچین در قالب Unit Test می توانید یه ماژول که ساخته اید را بررسی و از صحت اجرای صحیح آن آگاه شوید.
###### برای اینکه بخواهید در مورد test در لاراول بیشتر بدانید می توانید <a href="https://laravel.com/docs/10.x/testing">Laravel Testing</a> را مطالعه کنید. در لاراول تست ها به چند دسته تقسیم می شود، اول بحث <a href="https://laravel.com/docs/10.x/http-tests">HTTP Tests</a> است که به شما این امکان را می دهد انواع حالت هایی که مربوط به ساختار HTTP می شود را مورد ارزیابی قرار دهید. مورد دوم بحث تست کردن console است که تحت عنوان <a href="https://laravel.com/docs/10.x/console-tests">Console Tests</a> مطرح می شود. اگر بخواهیم دستورات در console را مورد بررسی قرار دهیم، می توانیم از این مورد استفاده کنیم. مورد سوم استفاده از پکیج <a href="https://laravel.com/docs/10.x/dusk">Laravel Dusk</a> است که از یک الگویی به صورت API برای انجام تست استفاده می کند. مورد چهارم در حوزه پایگاه داده است که تحت عنوان <a href="https://laravel.com/docs/10.x/database-testing">Database Testing</a> تعریف می شود و مورد پنجم هم اینکه می خواهید یک event را شبیه سازی کنید یه به عبارتی یک رخداد را به صورت تقلبی بسازید تا از روند آن آگاه شود، تحت عنوان <a href="https://laravel.com/docs/10.x/mocking">Mocking</a> مطرح می شود.

###### حال ما به عنوان مثال می خواهیم نمونه ای کوچک از این مسئله را پیاده سازی کنیم تا بعد در پروژه های بزرگ تر و واقعی از آن استفاده کنیم. به این منظور ابتدا با دستور زیر یک Feature Test می سازیم.
```bash
php artisan make:test HomePageTest
```
###### در پوشه tests وارد پوشه Feature می شویم و فایل HomePageTest.php ما در آن است. در کلاس آن می توانیم شروع کنیم به انجام انواع http test. دقت کنید، در ساخت انواع تابع ها یه قائده مهم است و باید رعایت شود، اینکه اول نام تابع حتما کلمه test باشد و بهتر است به صورت snake case بنویسیم اما camel case هم قبول می کند. به همین منظور مرحله به مرحله تابع های زیر را می نویسیم.
```bash
public function test_route_have_not_about()
{
    $response = $this->get('/about');
    $response->assertNotFound();
}
```
###### در تابع فوق به دنبال مسیر about می فرستیم و می خواهیم که اگر not found داد تست ما درست باشد. دقت کنید که می توانید جهت اطلاع از درست بودن تست خود، هر بار یا یک بار در آخر از دستور زیر استفاده کنید تا تست شما اجرا شود.
```bash
php artisan test
```
###### تابع بعدی را به صورت زیر می نویسیم.
```bash
public function test_request_for_home()
{
    $response = $this->get('/');
    $response->assertStatus(200);
}
```
###### می خواهیم که مسیر root را اجرا کند و اگر در راستای اجرا آن به کد 200 رسید، تست ما موفق است.
###### مورد بعدی می خواهیم بررسی کنیم آیا کلمه مورد نظر ما در صفحه اصلی وجود دارد یا خیر.
```bash
public function test_see_word_in_index()
{
    $response = $this->get('/');
    $response->assertSee('SwaggerUI');
}
```
###### مورد بعدی انتظار داریم کلمه ای که می گوییم در فایل صفحه اول وجود نداشته باشد.
```bash
public function test_do_not_see_word_in_index()
{
    $response = $this->get('/');
    $response->assertDontSee('Laravel');
}
```
###### مورد بعدی انتظار داریم در صفحه اصلی متن مورد نظر ما را بیابد به همین دلیل به صورت زیر می نویسیم.
```bash
public function test_see_text_in_index()
{
    $response = $this->get('/');
    $response->assertSeeText('http://localhost/swagger/api.yaml');
}
```
###### دقت کنید که تست ما نمی تواند خروجی ای که بعدا js می خواهد بسازد را ببیند.
###### حال وارد پوشه پوشه tests می شویم و فایل UnitFileTest.php را در پوشه Unit باز می کنیم و شروع می کنیم به نوشتن مواردی که می خواهیم
```bash
protected $emptyParameter = [];
public function test_some_assert_unit_test_function()
{
    $this->assertEquals(1, 1);
    $this->assertEquals('test', 'test');
    $this->assertArrayHasKey('first', ['first' => 'test']);
    $this->assertContains(3, [1, 2, 3]);
    $this->assertContains('test', ['laravel', 'uint', 'test']);
    $this->assertContainsOnly('string', ['1', '2', '3']);
    $this->assertCount(2, ['unit', 'test']);
    $this->assertEmpty($this->emptyParameter);
}
```
###### ابتدا یک property می سازیم به نام emptyParameter که به آن یک آرایه خالی می دهیم. بعد در تابعی که نوشته ایم چندین مورد را ارزیابی می کنیم، این کار صرفا جهت آشنایی و شروع کار است. مثلا می شود برابر بودن دو مقدار از انواع نوع ها را بررسی کرد یا اینکه آیا در یک آرایه کلیدی یا عنوان مورد نظر ما وجود دارد یا خیر یا آیا در یک آرایه داده مورد نظر ما نیز است، که این بررسی می تواند حتی در مورد داده های مختلف هم باشد. همچنین می توان بررسی نمود که آیا همه داده های یک آرایه از یک نوع است یا خیر، همچنین می توان تعداد اعضاء آرایه را مورد ارزیابی قرار داد یا خالی بودن یک آرایه را بررسی کرد.
###### همچنین می توان  یک object موقت ساخت و از آن استفاده نمود.
```bash
private function commentSample()
{
    return new Comment([
        'user_id' => 1,
        'post_id' => 1,
        'parent_id' => null,
        'child' => false,
        'title' => 'test',
        'text' => 'unit test',
    ]);
}
```
###### دقت کنید برای اینکه بخواهیم از comment استفاده کنیم، باید آن را use کنیم.
```bash
use App\Models\Comment;
```
###### مثلا می توانیم بررسی کنیم که آیا object ی که ساخته ایم خالی است یا خیر.
```bash
public function test_comment_create()
{
    $this->assertNotEmpty($this->commentSample());
}
```
###### اینکه بررسی کنیم آیا object ما کلید مورد نظر ما را دارد یا خیر.
```bash
public function test_comment_have_user()
{
    $this->assertArrayHasKey('user_id', $this->commentSample());
}
```
###### و اگر تعداد object های خود را در یک آرایه ذخیره کنیم، می توانیم تعداد آن را مورد ارزیابی قرار دهیم.
```bash
public function test_comment_count()
{
    $this->assertCount(1, array($this->commentSample()));
}
```
###### حال برای مثال در پوشه Actions یک فایل Unit.php می سازیم و به صورت زیر آن را می نویسیم.
```bash
<?php

namespace App\Actions;

class Unit
{
    public $number;
    public function __construct($value)
    {
        $this->number = $value;
    }
    public function convert_meter_to_centimeter()
    {
        return $this->number * 100;
    }
    public function convert_meter_to_millimeter()
    {
        return $this->number * 1000;
    }
    public function convert_meter_to_inch()
    {
        return $this->number * 39.37;
    }
}
```
###### یک کلاس از نوع تبدیل کننده واحد های اندازه گیری ساخته ایم و می خواهیم حال آن را مورد ارزیابی قرار دهیم.
###### مجدد وارد فایل UnitFileTest.php شده و تابع زیر را می نویسیم.
```bash
public function test_convertor_unit()
{
    $testNumber = new Unit(10);
    $this->assertEquals(1000, $testNumber->convert_meter_to_centimeter());
    $this->assertEquals(10000, $testNumber->convert_meter_to_millimeter());
    $this->assertEquals(393.7, $testNumber->convert_meter_to_inch());
    $this->assertContains(10, array($testNumber->number));
    $this->assertContainsOnly('integer', array($testNumber->number));
}
```
###### برای اینکه بخواهیم از کلاس Unit که ساخته ایم استفاده کنیم، باید آن را  use کنیم.
```bash
use App\Actions\Unit;
```
###### ابتدا عدد 10 را می سازیم  و بعد بررسی می کنیم وقتی تابع های ماژول ما اجرا شوند، به عدد مورد نظر ما می رسند یا خیر. همچنین می توانیم بررسی کنیم که آیا مقدار object ما 10 است یا خیر و یا type آن را بررسی کنیم.
###### این ها نمونه هایی است از کار هایی که می توان انجام داد تا به سلامت نرم افزاری که ساخته ایم مطمئن شویم و از خطا انسانی جلوگیری کنیم.


