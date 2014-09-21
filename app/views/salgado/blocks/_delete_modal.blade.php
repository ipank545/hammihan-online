<!-- Delete Modal -->
<div class="modal slide-down" id="removeModal" tabindex="-1" style="overflow-y:hidden;" role="dialog" aria-labelledby="removeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    آیا حذف این آیتم را تایید میکنید؟
                </h4>
            </div>
            <div class="modal-body">
                <p>این عمل پس از انجام قابل بازگشت نخواهد بود، لطفا دقت کنید</p>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-danger pull-right"
                    onclick="Common.submitDeleteForm('#delete_form')"
                >
                    <span class="glyphicon glyphicon-check"></span>
                    تایید میکنم
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
{{Form::open(array(
	'url'			=>	"#",
	'method'		=>	'delete',
	'aria-hidden'	=>	true,
	'id'			=>	'delete_form',
	'class'			=>	'delete_form'
))}}
{{Form::close()}}
@section('scripts')
	@parent
	<script src="{{asset('assets/JsLibs/Common.js')}}" type="text/javascript"></script>
@stop