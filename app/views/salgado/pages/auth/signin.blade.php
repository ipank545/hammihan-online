@extends('salgado.layouts.master')

@section('body_classes')auth-page @stop

@section('navigation') @stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2">
			<div class="content-box">
				<h4 class="text-primary text-center" style="padding:0;margin-top:0">{{trans('auth.signin_to_account')}}</h4><br>
                @include('salgado.blocks._messages')
				{{Form::open(array('route' => 'admin.auth.post_login' , 'method' => 'post', 'role' => 'form'))}}
					<div class="form-group {{($errors->has('identifier')?'has-error':'')}}">
						{{Form::label('identifier',trans('auth.login_ids'),['class' => 'control-label'])}}
						{{Form::text('identifier',null,['placeholder' => 'Username...', 'class' => 'form-control text-left dir-ltr'])}}
					</div>
					<div class="form-group {{($errors->has('password')?'has-error':'')}}">
						{{Form::label('password',trans('auth.password'),['class' => 'control-label'])}}
						{{Form::password('password',['placeholder' => 'Password...','class' => 'form-control text-left dir-ltr'])}}
					</div>
					<div class="checkbox">
						<label style="font-size:12px;">
							{{Form::checkbox('remember')}}
							{{trans('auth.remember_me')}}
						</label>
					</div>
					<button type="submit" style="margin-bottom:10px" class="btn btn-primary btn-block">{{trans('auth.signin')}}</button>
					<!--a href="#" style="margin-bottom:10px;" class="btn btn-block btn-default">ورود با حساب گوگل</a-->
					<!--a href="#" class="btn btn-link btn-block btn-xs">{{trans('auth.forgot_password?')}}</a-->
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@stop

@section('footer')
    <p class="text-center" style="color:#fff">سامانه خبری پردیسان تمامی حقوق محفوظ میباشد</p>
@stop
@section('header') @stop
