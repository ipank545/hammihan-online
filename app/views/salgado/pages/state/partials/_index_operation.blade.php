<div class="btn-group">
	<button
		type="button"
		class="btn btn-xs btn-danger"
		delete-url="{{ URL::route('admin.roles.delete',[ $state->id ])  }}"
		onclick="Common.setDeleteURL(this,'#delete_form')"
		data-toggle="modal"
		data-target="#removeModal"
	>
	    <span class="glyphicon glyphicon-remove"></span>
	</button>
    <a href="{{ URL::route('admin.article_states.edit', $state->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
</div>
