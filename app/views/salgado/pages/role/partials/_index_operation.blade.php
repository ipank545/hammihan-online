<div class="btn-group">
	<button
		type="button"
		class="btn btn-sm btn-danger"
		delete-url="{{ URL::route('admin.roles.delete',[ $role->id ])  }}"
		onclick="Common.setDeleteURL(this,'#delete_form')"
		data-toggle="modal"
		data-target="#removeModal"
	>
	 حذف
	</button>
    <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
    <a href="#" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
</div>