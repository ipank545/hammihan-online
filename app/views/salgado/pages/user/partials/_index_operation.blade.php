<div class="btn-group">
	<button
		type="button"
		class="btn btn-xs btn-danger"
		delete-url="{{ URL::route('admin.users.destroy',[ $user->id ])  }}"
		onclick="Common.setDeleteURL(this,'#delete_form')"
		data-toggle="modal"
		data-target="#removeModal"
	>
	    <span class="glyphicon glyphicon-remove"></span>
	</button>
    <a href="{{ URL::route('admin.users.edit', [$user->id]) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
</div>
