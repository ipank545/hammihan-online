<!DOCTYPE html>
<html lang="fa" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        @section('title')
            <title>{{$title or trans("settings.{$defaultTitle}")}}</title>
        @show

        @section('meta')
            @include('salgado.layouts.partial.meta')
        @show

        <script type="text/javascript" src="{{asset('assets/tiny/jquery-2.1.1.js')}}"></script>
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('assets/cal/css/theme.css')}}" title="Aqua" />

        <script type="text/javascript" src="{{asset('assets/cal/js/jalali.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/cal/js/calendar.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/cal/js/calendar-setup.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/cal/js/calendar-fa.js')}}"></script>


        <script type="text/javascript" src="{{asset('assets/tiny/tinymce/tinymce.min.js')}}"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea.mceEditor",
            theme: "modern",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "emoticons template paste textcolor colorpicker textpattern",
                "insertdatetime media nonbreaking save table contextmenu directionality"

            ],
            toolbar1: "insertfile undo redo | styleselect | print preview media | forecolor backcolor emoticons | bold italic",
            toolbar2: "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | link image",
            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });
        </script>




        @section('stylesheet')
            @include('salgado.layouts.partial.stylesheet')
        @show

    </head>
    <body class="fixed-bar {{ $body_classes or 'default' }} @section('body_classes')@show">
        <div id="wrap">

            @section('navigation')
                @include('salgado.blocks._navigation')
            @show

            @section('header')
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('salgado.blocks._messages')
                        </div>
                    </div>
                </div>
            @show

            @yield('content')

            @if(! empty($currentUser))
                @include('salgado.blocks._profile_modal')
            @endif

        </div>

        @section('footer')
            @include('salgado.blocks._footer')
        @show

        @section('script')
            @include('salgado.layouts.partial.script')
        @show
    </body>
</html>
