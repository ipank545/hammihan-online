@extends('salgado.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 cols-sm-12">
                            @if( isset($user))
                                <h4 class="text-right"><b>
                                    ویرایش کاربر
                                    {{ $user->identifier() }}
                                </b></h4>
                            @else
                                <h4 class="text-right"><b>ایجاد کاربر جدید</b></h4>
                            @endif
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12" style="text-align: left">
                            <a href="{{ URL::route('admin.users.index') }}" class="btn btn-primary">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                                لیست کاربران
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-offset-8 col-sm-12">

                            @include('salgado.pages.user.partials._form')

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

