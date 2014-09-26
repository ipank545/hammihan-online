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
@stop

@section('script')
    @parent
    @include('salgado.pages.article.new_partials._script')
    <script type="text/javascript">

    </script>
@stop

@section('stylesheet')
    @include('salgado.pages.article.new_partials._stylesheet')
@stop

