<div class="btn-group">
	<button
		type="button"
		class="btn btn-xs btn-danger"
		delete-url="{{ URL::route('admin.article.delete',[ $article->id ])  }}"
		onclick="Common.setDeleteURL(this,'#delete_form')"
		data-toggle="modal"
		data-target="#removeModal"
	>
	    <span class="glyphicon glyphicon-remove"></span>
	</button>

    <a href="#articleEditModal" class="btn btn-xs btn-primary edit-article"

     id                =     "{{ $article->id }}"                         data-im_title          =     "{{ $article->important_title }}"
     data-fi_title     =     "{{ $article->first_title }}"                data-se_title          =     "{{ $article->second_title }}"
     data-ed_body      =     "{{ htmlspecialchars($article->body) }}"     data-ed_summary        =     "{{ $article->summary }}"
     data-ed_author    =     "{{ $article->author }}"                     data-ed_publish_date   =     "{{ $article->publish_date }}"
     data-ed_category  =     "{{ $article->category }}"

     data-toggle="modal"><span class="glyphicon glyphicon-edit" ></span></a>
     @include('salgado.pages.article.partials._edit_modal')
</div>
