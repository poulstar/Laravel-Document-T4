# ساخت مکانیزم حذف هر پست توسط مدیر و بررسی نقش قبل از انجام درخواست

###### برای شروع ابتدا route خود را از نوع delete می سازیم و به صورت زیر می نویسیم.
```bash
Route::delete('delete-post-by-admin/{post}', [PostController::class, 'deletePostByAdmin'])->middleware(['can:'.Permissions::DELETE_ANY_POST]);
```
###### مسیر خود را ساخته و به تابع deletePostByAdmin در PostController ارجاع می دهیم و بر روی آن سطح دسترسی DELETE_ANY_POST را می دهیم که ویژه admin است، تا از دسترسی غیر مجاز جلوگیری کنیم.
###### وارد PostController شده و تابع deletePostByAdmin را می نویسیم.
```bash
public function deletePostByAdmin(Post $post)
{
    if ($post->media)
        $this->deleteMedia($post->media);
    if ($post->delete()) {
        return $this->successResponse([
            'message' => 'Post Deleted',
        ]);
    }
    return $this->failResponse();
}
```
###### تابع deletePostByAdmin را نوشته و مدل Post را به عنوان پارامتر می دهیم تا وقتی ID را دریافت کردیم، داده های مربوط به پست مربوطه را بیابیم، در مرحله بعدی بررسی می کنیم آیا پست مربوطه media دارد یا خیر، اگر داشت، دستور می دهیم ابتدا فایل آن را پاک نماید و بعد شرط می کنیم اگر پست حذف شد، یک پیام موفقیت برای مدیر درخواست دهنده ارسال شود تا آگاه شود.
###### حال برای اینکه ظاهر را داشته باشیم در swagger و بتوانیم عمل خود آزمایش کنیم، قطعه کد زیر را در بخش paths فایل api.yaml می نویسیم.
```bash
/api/delete-post-by-admin/{post}:
    delete:
      tags:
        - Post
      summery: delete all Post
      description: post can be deleted any post
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
###### مسیر خود را مطابق سرور می نویسیم و متغیر post را در path قرار می دهیم تا بتوان ID پست مورد نظر را برای آن ارسال نمود. method آن را از نوع delete می گذاریم و در دسته post قرارش می دهیم. برای مسیر خلاصه و توضیحات در نظر می گیریم و پارامتر post را تعریف می کنیم و schema آن را از نوع integer در نظر می گیریم و پر کردن آن را اجباری اعلام می کنیم. بخش responses را هم مثل گذشته می نویسیم. امنیت را فعال می کنیم تا کد امنیتی bearer به سمت سرور ارسال شود و نقش برای سرور محرز شود.
###### حال همه چی برای حذف پست آماده بوده و می توان از آن استفاده نمود.





