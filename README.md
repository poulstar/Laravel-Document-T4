# آموزش و پیاده سازی <a href="https://laravel.com/docs/10.x/mail">Laravel Mail</a>

###### در لاراول روش های مختلفی برای مدیریت کردن و ارسال email وجود دارد، اما ما می خواهیم ساده ترین راه، با استفاده از SMTP اقدام به ارسال email کنیم و سرور ارسال کننده خود را google در نظر می گیریم. دقت کنید که اگر بخواهید به قابلیت ارسال email توسط google دست یابید، باید ابتدا در تنظیمات حساب کاربری خود رمز دو مرحله ای را فعال کنید و بعد در بخش app key وارد شده و یک کلید برای gmail خود دریافت کنید.
###### سپس وارد فایل .env شده و بخش mail را پر می کنیم.
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME="fake.poulstar@gmail.com"
MAIL_PASSWORD="ftgtgsssfukhiyik"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="fake.poulstar@gmail.com"
MAIL_FROM_NAME="Poulstar"
```
###### حال می خواهیم از <a href="https://laravel.com/docs/10.x/mail#generating-mailables">Laravel Generating Mailables</a> استفاده کنیم و یک mail برای خود بسازیم.
```bash
php artisan make:mail PoulstarMail
```
###### بعد اینکه دستور را زدیم، یک پوشه به نام Mail در app ساخته می شود که فایل PoulstarMail.php در آن قرار می گیرد.
```bash
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PoulstarMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Poulstar Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
```
###### تگ php باز می شود و مسیر با namespace مشخص می شود، بعد آن مواردی که مورد نیاز شروع شدن است را لاراول use می کند و کلاس PoulstarMail از Mailable ارث می برد. در داخل کلاس trait های Queueable و SerializesModels نیز use می شود. تابعی وجود دارد به نام construct که می توانیم در شروع new شدن یک object از این کلاس را بسازیم. تابع envelope برای این است که تنظیماتی مانند عنوان email، آدرس فرستنده، موضوع و ... نیز مشخص شود. تابع content برای این است که کدام فایل از پوشه views در resources ارسال شود و چه متغیر هایی برای آن ارسال شود را تعیین می کند. تابع attachments هم برای این است که اگر email ارسالی ما حاوی فایل بود، بتوانیم فایلی را همراه email خود ارسال نماییم.
###### حال که برای کار خود نیاز داریم تا یک فایل html داشته باشیم، می توانیم وارد پوشه views شده و یک پوشه به نام mail بسازیم و فایل welcome.blade.php را در آن ایجاد می کنیم و قطعه کد زیر را در آن می نویسیم.
```bash
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poulstar Welcome Mail</title>
    <style>
        body {
            text-align: center;
        }

        img {
            margin: 50px auto;
            width: 200px;
            height: 200px;
        }

        h1 {
            font-size: 40px;
            color: gold;
            direction: rtl;
        }

        span {
            color: rgb(82, 219, 146);
            font-size: 60px;
            font-weight: lighter;
            font-style: italic;
        }
    </style>
</head>

<body>
    <img src="https://poulstar.org/_nuxt/why.a1ea10b7.png">
    <h1>سلام <span>{{ $username }}</span> عزیز، به خانواده پل استاری ما خوش آمدید</h1>
</body>

</html>
```
###### حال به سراغ PoulstarMail می رویم و شروع می کنیم به نوشتن تنظیمات خود. ابتدا شروع می کنیم و در تابع construct به عنوان پارامتر user را به صورت زیر می نویسیم تا از آن پشتیبانی کند و خودش یک user کامل را دریافت کند و بسازد.
```bash
public function __construct(protected User $user)
{
    //
}
```
###### برای اینکه user را بشناسد، آن را use می کنیم.
```bash
use App\Models\User;
```
###### حال در تابع envelope شروع می کنیم به نوشتن تنظیمات خودمان تا با استفاده از آن یک email ارسال شود.
```bash
public function envelope(): Envelope
{
    return new Envelope(
        from: new Address('fake.poulstar@gmail.com', 'Poulstar'),
        subject: 'Welcome To Poulstar',
    );
}
```
###### مشخصات فرستنده را با استفاده از from مشخص می کنیم و این کار با کلاس Address انجام می دهیم. برای اینکه کلاس Address را استفاده کنیم، آن را به صورت زیر use می کنیم.
```bash
use Illuminate\Mail\Mailables\Address;
```
###### در پارامتر های Address، جایگاه اول آدرس فرستنده است و پارامتر دوم برای نامی است که از جانب فرستنده می خواهیم نمایش داده شود. موضوع را هم با استفاده از subject تعیین می کنیم.
###### در تابع content هم به صورت زیر می نویسیم.
```bash
public function content(): Content
{
    return new Content(
        view: 'mail.welcome',
        with: [
            'username' => $this->user->name,
        ],
    );
}
```
###### در داخل تابع با استفاده از view مسیر و اسم فایلی که می خواهیم نمایش دهد را مشخص می کنیم و از طریق with، متغیر هایی که به فایل blade ما باید ارسال شود را معین می کنیم. حال همه چی برای ارسال یک email آماده است، به همین منظور برای نمونه در بخش register از آن استفاده می کنیم.
###### وارد فایل UserController شده و در تابع register بعد اینکه مطمئن شدیم کاربر ما ساخته شده است، به صورت زیر یک پیام خوش آمدید برای او ارسال می کنیم.
```bash
Mail::to($user->email)->send(new PoulstarMail($user));
```
###### از کلاس Mail استفاده می کنیم و با استفاده از تابع to گیرنده را مشخص می کنیم و گیرنده را هم email کاربر ثبت نام شده در نظر می گیریم و اجرا آن را هم با استفاده از تابع send انجام می دهیم که به عنوان پارامتر یک PoulstarMail را می سازیم و مقدار $user را به صورت کامل با تمام داده هایش به آن می دهیم.
###### برای اجرا موارد فوق لازم داریم تا هم Mail و هم PoulstarMail را use کنیم.
```bash
use Illuminate\Support\Facades\Mail;
use App\Mail\PoulstarMail;
```
###### حال همه چه برای اجرای یک ثبت نام و دریافت email خوش آمدید محیا است.

