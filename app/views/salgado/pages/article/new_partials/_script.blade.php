<script type="text/javascript" src="{{ asset('assets/cal/jalali.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/cal/calendar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/cal/calendar-setup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/cal/lang/calendar-fa.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/tiny/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        tinymce.init({
            selector: "textarea.mceEditor",
            theme: "modern",
            plugins: [
                "autolink lists link image print preview hr anchor pagebreak",
                "wordcount visualblocks visualchars code",
                "paste textcolor colorpicker textpattern",
                "nonbreaking save table contextmenu directionality"

            ],
            toolbar1: "insertfile undo redo | styleselect | print preview | forecolor backcolor | bold italic",
            toolbar2: "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | link image | ltr rtl",

            image_advtab: true,
            language : "fa",
            directionality:'rtl',
            content_css : "{{ asset('assets/salgado/css/tiny_custom.css') }}",
            relative_urls: false
        });
    });
    Calendar.setup({
    	inputField     :    "publish_date_input",
    	button         :    "publish_data_btn",
    	ifFormat       :    "%Y-%m-%d %H:%M",
    	showsTime      :    true,
    	dateType	   :	'jalali',
    	timeFormat     :    "24",
    	weekNumbers    :    false
    });
</script>
