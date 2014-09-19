@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="content-box">
					<h4 class="text-center">داشبورد</h4>
					@if(Session::has('success_message'))
					<ul class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<li style="font-size:12px;">{{ Session::get('success_message') }}</li>
					</ul>
					@endif
					<ul class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<li style="font-size:12px">اینجا داشبورد شماست, جدا چیز به درد بخوریه ازش استفاده کنید</li>
					</ul>
					<ul class="nav nav-list dash-list">
						<li><a href="#">لیست دانلود من<span class="pull-left">150</span></a></li>
						<li><a href="#">لیست لیست علاقه مندی های من<span class="pull-left">300</span></a></li>
						<li><a href="#">لیست اشتراک سریال های من<span class="pull-left">15</span></a></li>
						<li><a href="#">وضعیت اشتراک حساب<span class="pull-left glyphicon glyphicon-usd"></span></a></li>
						<li><a href="#">لاگ حساب کاربری<span class="pull-left glyphicon glyphicon-book"></span></a></li>
						<li><a href="#">ویرایش پروفایل و تنظیمات <span class="pull-left glyphicon glyphicon-user"></span></a></li>
						<li>
						<a href="#">
							خروج
							<span class="pull-left glyphicon glyphicon-off"></span>
						</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@stop