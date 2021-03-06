@section('body_classes')auth-page @stop
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-8 col-sm-offset-2 col-md-offset-3">
			<div class="content-box">
				<h4 class="text-primary text-center" style="padding:0;margin-top:0">
					ثبت پسورد جدید برای {{ Input::get('identifier') }}
				</h4><br>

				@if($errors->has() || Session::has('error_message'))
				<ul class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

					@if(Session::has('error_message'))
					<li style="font-size:12px;">{{Session::get('error_message')}}</li>
					@endif

					@foreach($errors->all() as $error)
					<li style="font-size:12px;">{{$error}}</li>
					@endforeach

				</ul>
				@endif

				@if (Session::has('success_message'))
				<ul class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<li style="font-size:12px;">{{ Session::get('success_message') }}</li>
				</ul>
				@endif

				{{Form::open(array('url' => 'auth/reset' , 'method' => 'post', 'role' => 'form'))}}

					{{Form::hidden('token', $token)}}
					{{Form::hidden('email', Input::get('identifier'))}}

					<div class="form-group">

						{{Form::label('password',
							'پسورد جدید',
							['class' => 'control-label']
						)}}
						{{Form::password('password',
							['placeholder' => 'Password...', 
							'class' => 'form-control text-left dir-ltr']
						)}}
					
					</div>
					<div class="form-group">

						{{Form::label('password_confirmation',
							'تکرار پسورد جدید',
							['class' => 'control-label']
						)}}
						{{Form::password(
							'password_confirmation',
							['placeholder' => 'Password confirm...', 
							'class' => 'form-control text-left dir-ltr']
						)}}

					</div>
					<button type="submit" style="margin-bottom:10px" class="btn btn-primary btn-block">ثبت پسورد جدید</button>
					<a href="#" class="btn btn-link btn-block btn-xs">ورود</a>
					<a href="#" class="btn btn-link btn-block btn-xs">حساب کاربری ندارید؟</a>
					
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@stop