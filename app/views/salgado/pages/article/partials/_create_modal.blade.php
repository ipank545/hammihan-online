<div class="modal fade" id="createModal" tabindex="-1"  role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
         {{ Form::open(['route' => 'admin.articles.store', 'class' => 'ajaxable-form article-form', 'name' => 'myform', 'id' => 'article_create_form', 'onsubmit' => 'return createValidation();' ])  }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
ایجاد خبر جدید
                </h4>
            </div>
            <div class="modal-body" style="min-height: 200px;">
                <div class="spinner-wrapper">
                    <div class="spinner"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="article-create-message-wrapper"></div>
                    </div>
                </div>
                    <div id="response" style="color: #ff0000"></div>
                    <div class="row">
                        <div class="col-sm-12">
                             <div class="control-group">
                                <label>تیتر فرعی بالا</label>
                                {{ Form::text('first_title', null, ['class' => 'form-control text-left languageLeft']) }}
                             </div>
                            <div class="control-group">
                                <label> تیتر اصلی</label>
                                {{ Form::text('important_title', null, ['id' => 'imp_title', 'class' => 'form-control text-left languageLeft']) }}
                            </div>
                            <div class="control-group">
                                <label> تیتر فرعی پایین</label>
                                {{ Form::text('second_title', null, ['class' => 'form-control text-left languageLeft']) }}
                            </div>
                            <div class="control-group">
                                 <label>متن </label>
                                {{ Form::textarea('body', null, ['class' => 'form-control text-left languageLeft mceEditor ']) }}
                            </div>
                            <div class="control-group">
                                <label>خلاصه خبر </label>
                                {{ Form::textarea('summary', null, ['id' => 'sumry', 'class' => 'form-control text-left languageLeft ', 'row' => '2']) }}
                            </div>
                            <div class="control-group">
                                <label> نویسنده یا گردآورنده</label>
                                {{ Form::text('author', null, ['id' => 'authr', 'class' => 'form-control text-left languageLeft']) }}
                            </div>
                            <div class="control-group">
                                <label>بر چسب ها</label>
                                {{ Form::text('tag', null, ['class' => 'form-control text-left languageLeft']) }}
                            </div>

                            <label> قسمت کتگوری ها</label>
                            <div class="control-group">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <ul class="list-unstyled">
                                    <li><lable>{{Form::radio('category', 'negahema')}}نگاه ما</lable></li>
                                    <li><lable>{{Form::radio('category', 'bashgah')}} باشگاه</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} خبرگزاری</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} دیدار</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} تریبون</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} راهبرد</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} تقویم </lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} کافه</lable></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <ul class="list-unstyled">
                                    <li><lable>{{Form::radio('category', '1')}} پارلمان اصلاحات</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} پژواک </lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} احزاب جهان</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} گفتمان</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} اتاق فکر</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}}شبکه</lable> </li>
                                    <li><lable>{{Form::radio('category', '1')}} بازار</lable></li>
                                    <li><lable>{{Form::radio('category', '1')}} پیشخوان </lable></li>
                                </ul>
                            </div>
                            </div>


                            <div class="control-group">
                                <label>تصویر کوچک به اندازه 60*80</label>
                                 {{Form::text('small_pic_url','',['id' => 'sm_pic_url', 'class'=>'form-control text-left languageLeft','name'=>'small_pic_url','id'=>'small_pic_url'])}}
                                 <label><a href="javascript:mcImageManager.open('myform','small_pic_url');" style="text-decoration:none;">[برای ارسال با انتخاب تصویر کوچک کلیک کنید]</a></label>
                            </div>
                            <div class="control-group">
                                <label>توجه:با تخصیص این عکس ، این مقاله در صفحه اول به عنوان مقاله اصلی نمایش داده خواهد شد!</label>
                                {{Form::text('large_pic_url','',['class'=>'form-control','name'=>'large_pic_url','id'=>'large_pic_url'])}}
                                <label><a href="javascript:mcImageManager.open('myform','large_pic_url');" style="text-decoration:none;">[برای ارسال با انتخاب تصویر بزرگ کلیک کنید]</a></label>
                            </div>
                            <div class="control-group">
                                <label > تاریخ انتشار </label>
                                {{ Form::text('publish_date', null, ['id' => 'date_input_1', 'class' => 'form-control text-left languageLeft']) }}
                                 <img src={{asset('assets/salgado/img/cal.png')}} id='date_btn_1' />
                            </div>
                            <div class="control-group">
                                <label>دریافت نظرات</label>
                                {{ Form::select('comment_part', array('0'=>'غیرفعال','1'=>'فعال'), ['class' => 'form-control text-left languageLeft']) }}
                            </div>
                        </div>
                    </div>
                    <br>

            </div>
            <div class="modal-footer">
                <button
                    type="submit"
                    class="btn btn-primary pull-right article-form-submit"
                    onclick=""
                    name="btnSubmit"
                >
                    <span class="glyphicon glyphicon-plus"></span>
ایجاد خبر جدید
                </button>
                <button
                    type="button"
                    class="btn btn-default pull-left"
                    data-dismiss="modal"
                >
                    <span class="glyphicon glyphicon-remove"></span>
                    بستن
                </button>
            </div>
         {{ Form::close() }}
        </div>
    </div>
</div>


@section('script')
    @parent
    <script type="text/javascript" src="{{ asset('assets/JsLibs/Salgado.js') }}"></script>
    <script class="error-message-template" type="text/template">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                <% _.each(errors, function(error) { %>
                    <li><%= error[0] %></li>
                <% }); %>
            </ul>
        </div>
    </script>
    <script class="success-message-template" type="text/template">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                <li></li>
            </ul>
        </div>
    </script>
   //<script type="text/javascript">
   //    $(".article-form-submit").click(function(e){
   //       var dd=(tinyMCE.activeEditor.getContent());
   //       var messageContainer = $(".article-create-message-wrapper");
   //       var formWrapper = $("#createModal .modal-body");
   //       var form = $(".ajaxable-form.article-form");
//
   //      Salgado.ajaxForm(form, messageContainer, formWrapper, $(this))
   //    });
   //</script>

   <script type="text/javascript">
                function createValidation(){

               var bool = true;

               var response = '';
               var important_title = document.getElementById('imp_title').value;
               var summary = document.getElementById('sumry').value;
               var author = document.getElementById('authr').value;
               var small_pic_url = document.getElementById('sm_pic_url').value;
               var publish_date = document.getElementById('date_input_1').value;
               var body = tinyMCE.activeEditor.getContent();


               if (important_title == '') {

                   response = 'وارد کردن تیتر اصلی الزامی است  </br>';

                   bool = false;
               }
               if (summary == '') {

                   response += 'وارد کردن فیلد خلاصه خبر الزامی است</br>';

                   bool = false;
               }
               if (body == '') {

                   response += 'لطفا متن خبر را وارد کنید</br>';
                   bool = false;
               }
               if (small_pic_url == '') {

                   response += 'لطفا برای خبر تصویر انتخاب کنید</br>';

                   bool = false;
               }
               if (author == '') {

                   response += 'لطفا نام نویسنده را وارد کنید</br>';

                   bool = false;
               }
               if (publish_date == '') {

                   response += 'لطفا زمان انتشار را تعیین نمایید  </br>';

                   bool = false;
               }

                $('#response').html(response).fadeIn('slow');
               // alert(body);
               return bool;

      }

   </script>

@stop