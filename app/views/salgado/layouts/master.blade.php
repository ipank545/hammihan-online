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

        </div>

        @section('footer')
            @include('salgado.blocks._footer')
        @show

        @section('script')
            @include('salgado.layouts.partial.script')
        @show
    </body>
</html>
