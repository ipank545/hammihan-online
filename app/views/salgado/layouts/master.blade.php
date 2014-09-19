<!DOCTYPE html>
<html lang="fa" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        @section('title')
                <title>{{$title or trans("settings.{$defaultTitle}")}}</title>
        @show

        @section('meta')
                @include('salgado.layouts.partial.meta')
        @show

        @section('stylesheet')
                @include('salgado.layouts.partial.stylesheet')
        @show
        @section('script')
                @include('salgado.layouts.partial.script')
        @show
        @yield('additional_header_tags')
    </head>
    <body class="fixed-bar {{ $body_classes or 'default' }} @section('body_classes')@show">
        <div id="wrap">
            @section('navigation')
                @include('salgado.blocks.navigation')
            @show
            @yield('header')
            @yield('content')
            @yield('sidebar')
            @yield('pre_footer')
        </div>
        @section('footer')
            @include('salgado.blocks.footer')
        @show
    </body>
</html>
