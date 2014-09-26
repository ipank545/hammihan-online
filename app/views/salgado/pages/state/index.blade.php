@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4><b>لیست مراحل انتشار خبر</b></h4>
                        </div>
                        <div class="col-lg-6" style="text-align: left">
                            <a href="{{ URL::route('admin.article_states.create') }}" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"></span>
                                ایجاد مرحله جدید
                            </a>
                        </div>
                    </div>
                    <hr>
                    @if(! $states->isEmpty())
                        @include('salgado.pages.state.partials._content_table')
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
    @include('salgado.pages.role.partials._scripts')
@stop

