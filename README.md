# ساخت فرآیند حذف پست های خود با توجه به حق مالکیت فرد نسبت به پست

###### باز هم مثل روال گذشته، نیاز است یک route داشته باشیم تا بتوانیم یک عملکرد را بسازیم، به همین منظور وارد فایل api.php می شویم و کد زیر را می نویسیم.
```bash
Route::delete('delete-my-post/{post}', [PostController::class, 'deleteMyPost'])->middleware(['can:'.Permissions::DELETE_MY_POST]);
```
###### یک route از نوع delete می سازیم و آن را ارجاع می دهیم به تابع deleteMyPost در PostController و سطح دسترسی DELETE_MY_POST را می سازیم تا از دسترسی غیر مجاز جلوگیری کنیم. اما این دسترسی نمی تواند تشخیص دهد که ما صاحب و سازنده پست هستیم یا خیر، به همین دلیل باید برای مرحله امنیتی بعد، در controller اقدام کنیم.
###### به همین منظور وارد PostController شده و تابع deleteMyPost را می نویسیم.
```bash
public function deleteMyPost(Post $post)
{
    if ($post->user_id !== Auth::id()) {
        return $this->failResponse([], 403);
    }
    if ($post->media)
        $this->deleteMedia($post->media);
    if($post->delete()) {
        return $this->successResponse([
            'message' => 'Post Deleted',
        ]);
    }
    return $this->failResponse();
}
```
###### در شروع تابع، بخش پارامتر، مدل Post را می نویسیم تا ابتدا پست را برای ما بیابد، بعد آن در اولین گام بررسی می کنیم آیا فرد درخواست دهنده، مالک پست هست یا خیر. این کار هم از تطابق ID پست با ID فرد login شده متوجه می شویم. اگر فردی که درخواست داده، خواسته برای پستی که مربوط به اون نیست درخواست می دهد، پیام خطا با کد 403 می دهیم و اگر مجاز بود به ادامه رفته و اول بررسی می کنیم آیا پست ما media دارد یا خیر، اگر داشت، دستور پاک کردن آن را صادر می کنیم.
###### در مرحله بعد هم شرط می گذاریم اگر پست پاک شد، پیام موفقیت ارسال شود که درخواست دهنده از وضعیت و نتیجه درخواست خود آگاه شود . اگر مشکلی وجود داشت، پیام شکست باز گردد.
###### برای اینکه بخواهیم فضایی داشته باشیم تا بتوانیم مکانیزم خود را مورد سنجش  قرار دهیم، وارد api.yaml شده و کد زیر را در بخش paths می نویسیم.
```bash
/api/delete-my-post/{post}:
    delete:
      tags:
        - Post
      summery: delete my Post
      description: User can be deleted own post
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
###### آدرس path را مطابق سرور می نویسیم و در آن متغیر post را می گذاریم تا بشود ID پست مورد نظر را ارسال نمود. سپس در داخل آن، نوع method را delete می گذاریم و tag آن را در مجموعه post در نظر می گیریم. خلاصه و توضیحات مورد نظر خود را می نویسیم و پارامتر post را تعریف می کنیم و schema آن را از نوع integer در نظر می گیریم و اجبار می کنیم که حتما پر شود. بخش پاسخ را نیز باز هم مثل گذشته تکرار می کنیم و در انتها security را فعال می کنیم تا کد امنیتی login ما برای سرور ارسال شود.
###### حال همه چی برای پاک کردن پست های خود محیا است و می شود از آن استفاده نمود.






