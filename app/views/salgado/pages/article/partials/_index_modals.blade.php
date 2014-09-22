@include('salgado.blocks._delete_modal')
<!-- Create article modal -->
<div class="modal fade" id="createModal" tabindex="-1" style="overflow-y:hidden;" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
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
                        <div class="role-create-message-wrapper"></div>
                    </div>
                </div>
                {{ Form::open(['route' => 'admin.api.v1.articles.store', 'class' => 'ajaxable-form role-form'])  }}
                    <div class="row">
                        <div class="col-sm-12">
                             <div class="control-group">
                                <label>تیتر فرعی بالا</label>
                                {{ Form::text('first_title', null, ['class' => 'form-control text-left languageLeft mceEditor']) }}
                             </div>
                            <div class="control-group">
                                <label> تیتر اصلی</label>
                                {{ Form::text('important_title', null, ['class' => 'form-control text-left languageLeft mceEditor']) }}
                            </div>
                            <div class="control-group">
                                <label> تیتر فرعی پایین</label>
                                {{ Form::text('second_title', null, ['class' => 'form-control text-left languageLeft mceEditor']) }}
                            </div>
                            <div class="control-group">
                                 <label>متن </label>
                                {{ Form::textarea('body', null, ['class' => 'form-control text-left languageLeft ', 'placeholder' => 'Example: editor']) }}
                            </div>
                            <div class="control-group">
                                <label>خلاصه خبر </label>
                                {{ Form::textarea('summary', null, ['class' => 'form-control text-left languageLeft ', 'row' => '2']) }}
                            </div>
                            <div class="control-group">
                                <label> نویسنده یا گردآورنده</label>
                                {{ Form::text('author', null, ['class' => 'form-control text-left languageLeft']) }}
                            </div>
                            <div class="control-group">
                                <label>بر چسب ها</label>
                                {{ Form::text('tag', null, ['class' => 'form-control text-left languageLeft']) }}
                            </div>
                            <div class="control-group">
                                <label> قسمت کتگوری ها</label>

                                <ul class="list-unstyled">
                                <li><lable class="checkbox">{{Form::checkbox('negahema', '1')}}نگاه ما</lable></li>
                                <li><lable class="checkbox">{{Form::checkbox('bashgah', '1')}} باشگاه</lable></li>
                                <li><lable class="checkbox">{{Form::checkbox('khabargozari', '1')}} خبرگزاری</lable></li>
                                <li><lable class="checkbox">{{Form::checkbox('didar', '1')}} دیدار</lable></li>
                                <li><lable class="checkbox">{{Form::checkbox('tribon', '1')}} تریبون</lable></li>
                                <li><lable class="checkbox">{{Form::checkbox('rahbord', '1')}} راهبرد</lable></li>
                                <li><lable class="checkbox">{{Form::checkbox('taghvim', '1')}} تقویم </lable></li>
                                <li><lable class="checkbox">{{Form::checkbox('kafe', '1')}} کافه</lable></li>
                                </ul>

                            </div>

                        </div>
                        <div class="control-group">
                            <label>تصویر کوچک به اندازه 60*80</label>
                            {{ Form::text('small_pic_url', null, ['class' => 'form-control text-left languageLeft']) }}
                        </div>
                        <div class="control-group">
                            <label>توجه:با تخصیص این عکس ، این مقاله در صفحه اول به عنوان مقاله اصلی نمایش داده خواهد شد!</label>
                            {{ Form::text('large_pic_url', null, ['class' => 'form-control text-left languageLeft']) }}
                        </div>
                        <div class="control-group">
                            <label > تاریخ انتشار </label>
                            {{ Form::text('publish_date', null, ['class' => 'form-control text-left languageLeft']) }}
                        </div>
                        <div class="control-group">
                            <label>دریافت نظرات</label>
                            {{ Form::select('comment_part', array('0'=>'غیرفعال','1'=>'فعال'), ['class' => 'form-control text-left languageLeft']) }}
                        </div>
                    </div>
                    <br>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-primary pull-right role-form-submit"
                    onclick=""
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
    <script type="text/javascript">
        $(".role-form-submit").click(function(e){
            var messageContainer = $(".role-create-message-wrapper");
            var formWrapper = $("#createModal .modal-body");
            var form = $(".ajaxable-form.role-form");
            Salgado.ajaxForm(form, messageContainer, formWrapper, $(this))
        });
    </script>
@stop