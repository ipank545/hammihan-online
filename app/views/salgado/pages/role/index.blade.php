@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                        @include('salgado.pages.role.partials._index_header')
                        <hr>
                        @if(! $roles->isEmpty())
                            @include('salgado.pages.role.partials._content_table')
                        @else
                            @include('salgado.pages.role.partials._no_content')
                        @endif
                </div>
            </div>
        </div>
    </div>
    @include('salgado.pages.role.partials._index_modals')
@stop

@section('script')
    @parent
    <script type="text/javascript">
        console.log({{ $roles  }});
    </script>
    <script type="text/javascript" src="{{ asset('assets/JsLibs/Common.js') }}"></script>
@stop

