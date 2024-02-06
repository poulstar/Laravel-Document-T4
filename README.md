# آموزش ویرایش و حذف یک comment با توجه به سطح دسترسی ویژه admin 

###### برای شروع ابتدا فرآیند ویرایش یک comment را می سازیم، به دلیل اینکه از apiResource استفاده می کنیم، نیاز به route نویسی نیست از همین رو وارد مرحله پیاده سازی می شویم. ابتدا برای اینکه بتوانیم موارد یا داده های که به سمت ما می آید را بررسی و احراز کنیم، به سراغ CommentRequest رفته و برای روش put هم برنامه ریزی  می کنیم. ابتدا از بخش authorize شروع می کنیم و با یکی elseif برای این حالت هم کد می نویسیم.
```bash
elseif ($this->isMethod('put')) {
    if (Auth::user()->hasPermissionTo(Permissions::UPDATE_ANY_COMMENT)) {
        return true;
    } else {
        return false;
    }
}
```
###### مرحله بعد نوبت آن است که به سراغ rules برویم و برای حالت put قوانینی داشته باشیم از همین رو در قالب یک elseif قوانین را می نویسیم.
```bash
elseif ($this->isMethod('put')) {
    return [
        'title' => 'nullable|min:3|max:100',
        'text' => 'nullable|min:3|max:10000',
    ];
}
```
###### حال وارد CommentController شده و تابع update را ویرایش می کنیم و کد های مورد نظر خود را می نویسیم.
```bash
public function update(CommentRequest $request, Comment $comment)
{
    $data = $request->safe(['title', 'text']);
    if ($request->input('title'))
        $comment->title = $data['title'];
    if ($request->input('text'))
        $comment->text = $data['text'];
    if ($comment->update()) {
        return $this->successResponse([
            'message' => 'Your Update Accepted',
        ], 200);
    } else {
        return $this->failResponse([
            'message' => 'Your Data have problem'
        ], 409);
    }
}
```
###### در پارامتر های تابع update ابتدا CommentRequest را می نویسیم، تا وقتی درخواست کاربر آمد، در حالت put بررسی شود آیا کاربر دسترسی عمل ویرایش را دارد یا خیر، و از سوی دیگر، در راستای پر کردن مقادیر، قوانین ما را رعایت  نموده است یا خیر. پارامتر دوم هم مدل Comment را در نظر می گیریم تا برای ما comment مورد نظر را بیابد. وقتی وارد تابع شدیم، داده های safe شده مورد نظر خود یعنی title و  text را می گیریم و بررسی می کنیم، آیا title پر است یا خیر، اگر پر بود، مقدار دهی می کنیم، در غیر اینصورت از آن گذر می کنیم. همین کار را برای text هم انجام می دهیم. در انتها عمل بروز شدن متکی به شرط انجام شدن قرار می دهیم، اگر انجام شد، پیام موفقیت ارسال می کنیم و اگر مشکلی در اجراء آن وجود داشت با پیام خطا درخواست دهنده را آگاه می کنیم. 
###### حال نوبت آن است که به سراغ api.yaml رفته و ظاهر را درست کنیم تا بتوان برای ویرایش یک comment اقدام نمود. برای اینکه بخواهیم یک comment را ویرایش کنیم، ابتدا باید schema آن را بسازیم، به همین دلیل وارد components شده و در بخش schemas به صورت زیر می نویسیم.
```bash
UpdateComment:
  type: object
  properties:
    title:
      type: string
    text:
      type: string

```
###### عنوان schema خود را UpdateComment می گذاریم و نوع آن را object در نظر می گیریم و property هایی که می خواهیم بفرستیم را از نوع string در نظر می گیریم.
###### مسیری که درخواست باید ارسال شود، /api/comments/{comment} است، در حالی که ما این مسیر را برای گرفتن زیر مجموعه های یک comment استفاده کردیم و اجازه نداریم یک path را مجدد تکرار کنیم. به همین دلیل وارد همان path شده و method بعدی خود یعنی put را می سازیم.
```bash
put:
    tags:
      - Comment
    summery: update Comment
    description: update any Comment
    parameters:
      - name: comment
        in: path
        description: comment ID
        schema:
          type: integer
        required: true
    requestBody:
      content:
        application/x-www-form-urlencoded:
          schema:
            $ref: "#/components/schemas/UpdateComment"
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
###### وقتی method خود یعنی put را نوشتیم، در داخل آن tag مسیر را مشخص می کنیم و برای آن خلاصه و توضیحات در نظر می گیریم. پارامتر comment را تعیین تکلیف می کنیم و اجبار می کنیم که پر شود و چون داده های ارسالی ما به صورت متنی است، نوع requestBody را application/x-www-form-urlencoded می گذاریم و schema آن را ارجاع می دهیم به UpdateComment و برای بخش responses هم مثل گذشته اقدام می کنیم و برای اینکه هویت کاربر خود را ثابت کنیم، از security استفاده می کنیم.
###### تا اینجا کار عمل ویرایش comment انجام شد، حال نوبت حذف comment و بررسی دسترسی درخواست دهنده است. چون بخش delete در قالب destroy در apiResource تعریف شده است، نیازی به نوشتن یک route جدید نیست و مستقیما وارد CommentController می شویم و تابع destroy را به صورت زیر می نویسیم.
```bash
public function destroy(Comment $comment)
{
    if (Auth::user()->hasPermissionTo(Permissions::DELETE_ANY_COMMENT)) {
        $comment->delete();
        return $this->successResponse([
            'message' => 'Comment Deleted',
        ], 200);
    } else {
        return $this->failResponse([], 403);
    }
}
```
###### در بخش پارامتر تابع از مدل comment استفاده می کنیم تا به نظر مد نظر درخواست دهنده برسیم. سپس با یک شرط دو وضعیت می سازیم، اول اینکه آیا کاربری که درخواست داده است، سطح دسترسی DELETE_ANY_COMMENT را دارد؟ اگر داشت، comment را پاک می کنیم و با یک پیام موفقیت به اون اطلاع می دهیم و اما اگر دسترسی نداشت، وارد حالت دوم می شویم و با باز گرداندن پیام خطا و هشدار عدم دسترسی ، او را آگاه می کنیم.
###### حال نوبت آن است تا وارد api.yaml شده و method بعدی یعنی delete را به مسیر /api/comments/{comment} اضافه کنیم.
```bash
delete:
  tags:
    - Comment
  summery: delete Comment
  description: delete any Comment
  parameters:
    - name: comment
      in: path
      description: comment ID
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
###### بعد اینکه method مشخص شد، در داخل آن، tag را مشخص می کنیم و خلاصه و توضیحاتی برای آن در نظر می گیریم و وضعیت پارامتر comment را مشخص می کنیم و اجبار می کنیم در هنگام درخواست، حتما پر شود. responses را مطابق گذشته تکرار می کنیم و برای این حالت هم security را فعال می کنیم.
###### حال همه چی برای ویرایش و حذف یک comment آماده است و می توانیم از آن استفاده نماییم.




