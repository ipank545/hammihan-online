@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                        @include('salgado.pages.article.partials._index_header')
                        <hr>
                        @if(! $articles->isEmpty())
                            @include('salgado.pages.article.partials._content_table')
                        @else
                            @include('salgado.pages.article.partials._no_content')
                        @endif
                </div>
            </div>
        </div>
    </div>

    @include('salgado.pages.article.partials._index_modals')

@stop
@section('script')
    @parent
    @include('salgado.pages.role.partials._scripts')

    <script type="text/javascript">
        Calendar.setup({
        	inputField     :    "date_input_2",
        	button         :    "date_btn_2",
        	ifFormat       :    "%Y-%m-%d %H:%M",
        	showsTime      :    true,
        	dateType	   :	'jalali',
        	timeFormat     :    "24",
        	weekNumbers    : false
        });
    </script>
    <script type="text/javascript">
             $(".edit-article").click(function (e){
                 var id  = $(this).attr('id');
                 var tit = $(this).data('im_title');
                 var fir = $(this).data('fi_title');
                 var sec = $(this).data('se_title');
                 var bod = $(this).data('ed_body');
                 var sum = $(this).data('ed_summary');
                 var aut = $(this).data('ed_author');
                 var pdt = $(this).data('ed_publish_date');
                 var cat = $(this).data('ed_category');

                 $("#article_update_id").val(id);
                 $("#im_title").val(tit);
                 $("#fi_title").val(fir);
                 $("#se_title").val(sec);
                 $("#ed_summary").val(sum);
                 $("#ed_author").val(aut);
                 $("#date_input_2").val(pdt);
                 $("#ed_category").val(cat);
              tinymce.editors[0].setContent(bod);

             });
    </script>



    <script type="text/javascript">
        Calendar.setup({
        	inputField     :    "date_input_1",
        	button         :    "date_btn_1",
        	ifFormat       :    "%Y-%m-%d %H:%M",
        	showsTime      :    true,
        	dateType	   :	'jalali',
        	timeFormat     :    "24",
        	weekNumbers    : false
        });
     </script>



@stop

