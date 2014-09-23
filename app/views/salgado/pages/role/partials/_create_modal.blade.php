<div class="modal fade" id="createModal" tabindex="-1" style="overflow-y:hidden;" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    ایجاد نقش کاربری جدید
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
                        <div class="role-create-message-wrapper"></div>
                    </div>
                </div>
                {{ Form::open(['route' => 'admin.api.v1.roles.store', 'class' => 'ajaxable-form role-form disable-submit', 'data-submit-btn' => '.role-form-submit'])  }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="control-group">
                                <label> نام نقش کاربری</label>
                                {{ Form::text('name', null, ['class' => 'form-control text-left languageLeft', 'placeholder' => 'Example: editor']) }}
                            </div>
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
                    ایجاد نقش کاربری جدید
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
