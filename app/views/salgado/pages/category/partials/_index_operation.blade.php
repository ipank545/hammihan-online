<div class="btn-group">
	<button
		type="button"
		class="btn btn-xs btn-danger"
		delete-url="{{ URL::route('admin.categories.destroy',[ $category->id ])  }}"
		onclick="Common.setDeleteURL(this,'#delete_form')"
		data-toggle="modal"
		data-target="#removeModal"
	>
	    <span class="glyphicon glyphicon-remove"></span>
	</button>
    <a href="{{ URL::route('admin.categories.edit', [$category->id]) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
</div>
