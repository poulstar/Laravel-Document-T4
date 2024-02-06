# آموزش ساخت دستور ترمینالی و اجرا ارسال SMS همگانی از طریق اجرا یک دستور در ترمینال

###### برای اینکه بخواهیم یک دستور ترمینالی بسازیم، ابتدا باید در ترمینال یک دستور make:command بزنیم تا بشود یک فایل جهت پیاده سازی دستور اختصاصی ما فراهم شود.
```bash
php artisan make:command SendSMSToAll
```
###### وقتی این دستور را می زنید، در پوشه app، در پوشه console، یک پوشه شکل می گیرد که فایل شما در آن قرار می گیرد، نام این پوشه Commands است.
```bash
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendSMSToAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-s-m-s-to-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
```
###### یک فایل php شکل می گیرد که در آن با namespace مسیر فایل معین می شود. سپس کلاس Command برای کار ما use می شود و یک کلاس به نامی که ما در ترمینال زدیم از Command ارث برده و ایجاد می شود. در داخل کلاس دو متغیر وجود دارد که protected است. اولی signature است که به صورت پیش فرض ساخته می شود و برای این است که بعد از php artisan  آن را بزنیم. به همین منظور آن را به صورت زیر می نویسیم.
```bash
protected $signature = 'sms:all';
```
###### مورد بعدی description است که در صورت نیاز می توانید آن را تغییر دهید که ما این کار را نکردیم. و بعد آن تابعی است به نام handle که در آن مکانیزمی می نویسیم و بعد اجرا دستور php artisan sms:all، آن نیز اجرا می شود. حال برای اینکه بخواهیم بعد زدن دستور، یک پیام همگانی ارسال شود، ابتدا به ماژول sms رفته و تابع sms همگانی را می سازیم.
```bash
public static function sendSMSToAll($message, $receptors)
{
    $curl = curl_init();

    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => "https://api.ghasedak.me/v2/sms/send/pair",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "message=$message&receptor=$receptors&linenumber=30005006009303",
            CURLOPT_HTTPHEADER => array(
                "apikey: " . self::API_KEY,
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
            )
        )
    );
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $response = json_decode($response, true);
        try {
            if ($response['result']['code'] === 200) {
                return true;
            }
        } catch (Exception $e) {
            Log::error(json_encode([$response, self::API_KEY]));
            return $response;
        }
    }
    return false;
}
```
###### تابع sendSMSToAll را می سازیم و به عنوان پارامتر به آن پیامی که باید ارسال شود و نیز گیرندگان را تحویل می دهیم. یک CURL ایجاد می کنیم و آدرس را به SMS همگانی قاصدک می زنیم و داده ها را مطابق <a href="https://ghasedak.me/docs#SendBulk2Box">الگو سرور</a> می نویسیم. apikey خود را معرفی می کنیم و درخواست را ارسال می کنیم، وقتی پاسخ بازگشت، برای حالت های مختلف برنامه ریزی می کنیم و پاسخ های درست می دهیم. دقت کنید که موقع SMS همگانی باید یک شماره همگانی خرید کنید و از طریق آن و از طریق آن ارسال کنید و باید یکی از پلن های قاصدک را قبل آن گرفته باشید. حال که تابع را ساختیم، وارد فایل SendSMSToAll می شویم تا command خود را کامل کنیم.

```bash
public function handle()
{
    echo "Start SMS Command \n";
    $message = "سلام، پل استار موسسه شتابدهی استعداد";
    $phones = User::all()->pluck('phone')->toArray();
    $phonesToString = implode(",", $phones);
    SMS::sendSMSToAll($message, $phonesToString);
    echo "End SMS Command \n";
}
```
###### تابع handle را با یک echo شروع کرده و با یک echo تمام می کنیم تا وقتی دستور اجرا شد، بتوانیم تشخیص دهیم که چه وقتی شروع شده و چه زمانی تمام شده است. در این بین در یک متغیر پیام خود را ذخیره می کنیم و از طریق مدل user، با استفاده از pluck تمام شماره ها را می گیریم و به آرایه تبدیل می کنیم و آن را با تابع implode تبدیل یه یک string می کنیم. بعد دستور می دهیم که یکی sms همگانی به پیام تعیین شده به گیرنده های ما ارسال شود.
###### برای موارد فوق لازم است تا موارد زیر use شود.
```bash
use App\Models\User;
use App\Actions\SMS;
```
###### حال همه چی برای اجرا sms همگانی برای تمام کاربران ما آماده است، اما دقت کنید که این امر در این حال محدود است و برای اینکه بخواهید به صورت کامل انجام دهید، باید حساب کاربری خود را ساخته و از apikey خود استفاده نمایید.






