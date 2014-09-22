@include('salgado.blocks._delete_modal')
<!-- Create role modal -->
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
                <div class="spinner-wrapper">
                    <div class="spinner"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="role-create-message-wrapper"></div>
                    </div>
                </div>
                {{ Form::open(['route' => 'admin.api.v1.roles.store', 'class' => 'ajaxable-form role-form'])  }}
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