@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                        @include('salgado.pages.user.partials._index_header')
                        <hr>
                        @if(! $users->isEmpty())
                            @include('salgado.pages.user.partials._content_table')
                        @else
                            @include('salgado.pages.user.partials._no_content')
                        @endif
                </div>
            </div>
        </div>
    </div>
    @include('salgado.blocks._delete_modal')
@stop
