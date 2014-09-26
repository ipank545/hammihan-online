<div class="modal fade" id="articleEditModal" tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
         {{ Form::open(['route' => 'admin.articles.update', 'method' => 'put', 'class' => 'article-update-form text-right',  'onSubmit' => 'return editValidation();'])  }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
 ویرایش خبر:
                </h4>
            </div>
            <div class="modal-body" style="min-height: 200px;">
                <div class="row spinner-wrapper">
                    <div class="spinner-inner vertical-center col-lg-12">
                        <div class="spinner"></div>
                        <button type="button" class="btn btn-link btn-sm canceler"><span class="glyphicon glyphicon-remove"></span> کنسل</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="update-article-message-wrapper"></div>
                    </div>
                </div>
                    <div id="ed-response" style="color: #ff0000"></div>
                    <input type="hidden" id="article_update_id" name="id">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="control-group">
                                <label> تیتر فرعی بالا</label>
                                {{ Form::text('first_title',null, ['id' => 'fi_title', 'class' => 'form-control text-right']) }}
                            </div>
                            <div class="control-group">
                                <label> تیتر اصلی</label>
                                {{ Form::text('important_title',null, ['id' => 'im_title', 'class' => 'form-control text-right']) }}
                            </div>
                            <div class="control-group">
                                <label> تیتر فرعی پایین</label>
                                {{ Form::text('second_title',null, ['id' => 'se_title', 'class' => 'form-control text-right']) }}
                            </div>
                            <div class="control-group">
                                <label> متن</label>
                                {{ Form::textarea('body', null, ['class' => 'form-control text-right languageLeft mceEditor text-right']) }}
                            </div>
                            <div class="control-group">
                                <label>خلاصه خبر</label>
                                {{ Form::textarea('summary', null, ['id' => 'ed_summary', 'class' => 'form-control text-right', 'row' => '2']) }}
                            </div>
                            <div class="control-group">
                                <label> نویسنده یا گردآورنده</label>
                                {{ Form::text('author', null, ['id' => 'c', 'class' => 'form-control text-right']) }}
                            </div>
                            <label> قسمت کتگوری ها</label>
                            <div class="control-group">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <ul class="list-unstyled">
                                    <li><lable>{{Form::radio('ed_category', '1')}}نگاه ما</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} باشگاه</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} خبرگزاری</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} دیدار</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} تریبون</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} راهبرد</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} تقویم </lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} کافه</lable></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <ul class="list-unstyled">
                                    <li><lable>{{Form::radio('ed_category', '1')}} پارلمان اصلاحات</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} پژواک </lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} احزاب جهان</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} گفتمان</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} اتاق فکر</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}}شبکه</lable> </li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} بازار</lable></li>
                                    <li><lable>{{Form::radio('ed_category', '1')}} پیشخوان </lable></li>
                                </ul>
                            </div>
                            </div>

                            <div class="control-group">
                                  <label > تاریخ انتشار </label>
                                  {{ Form::text('publish_date', null, ['id' => 'date_input_2', 'class' => 'form-control text-left languageLeft']) }}
                                  <img src={{asset('assets/salgado/img/cal.png')}} id='date_btn_2' />
                            </div>
                        </div>
                    </div>
                    <br>

            </div>
            <div class="modal-footer">
                <button
                    type="submit"
                    class="btn btn-primary pull-right article-update-form-submit"
                    onclick=""
                >
                    <span class="glyphicon glyphicon-edit"></span>
                    اعمال ویرایش
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


