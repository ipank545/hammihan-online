<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    ویرایش پروفایل من:
                    {{ $currentUser->identifier() }}
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
                        <div class="update-profile-message-wrapper"></div>
                    </div>
                </div>
                {{ Form::open(['route' => 'admin.api.v1.users.profile_update', 'method' => 'put', 'class' => 'ajaxable-form profile-update-form disable-submit', 'data-submit-btn' => '.profile-update-form-submit'])  }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="control-group">
                                <label> نام</label>
                                {{ Form::text('name', $currentUser->name, ['class' => 'form-control', 'placeholder' => 'مثال: احمد روشنی']) }}
                            </div>
                            <div class="control-group">
                                <label> ایمیل</label>
                                {{ Form::text('email', $currentUser->email, ['class' => 'form-control languageLeft', 'placeholder' => 'Example: hamid@yahoo.com']) }}
                            </div>
                            <div class="control-group">
                                <label> نام کاربری</label>
                                {{ Form::text('username', $currentUser->user_name, ['class' => 'form-control languageLeft', 'placeholder' => 'Example: reza']) }}
                            </div>
                            <div class="control-group">
                                <label> پسورد قدیمی</label>
                                {{ Form::password('old_password', ['class' => 'form-control languageLeft', 'placeholder' => 'Example: 123456']) }}
                                <p class="help-block">این فیلد زمانی که بخواهید پسورد خود را تغییر دهید الزامی است.</p>
                            </div>
                            <div class="control-group">
                                <label>پسورد جدید</label>
                                {{ Form::password('password', ['class' => 'form-control languageLeft', 'placeholder' => '987654']) }}
                            </div>
                                <div class="control-group">
                                    <label>تکرار پسورد جدید</label>
                                    {{ Form::password('password_confirmation', ['class' => 'form-control languageLeft', 'placeholder' => '987654']) }}
                                    <p class="help-block">عینا شبیه به فیلد پسورد جدید وارد کنید.</p>
                                </div>
                        </div>
                    </div>
                    <br>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-primary pull-right profile-update-form-submit"
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
        </div>
  </div>
</div>
