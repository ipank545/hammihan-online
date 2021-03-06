@extends('salgado.layouts.master')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="content-box">
					<h4 class="text-center">داشبورد من</h4>
					<ul class="nav nav-list dash-list">
						<li>
						    <a href="#">
						        <span class="glyphicon glyphicon-list-alt"></span>
						        لیست خبرهای من
						        <span class="label label-primary pull-left">150</span>
						    </a>
						</li>
						<li>
                            <a href="#">
                                <span class="glyphicon glyphicon-edit"></span>
                                لیست کامنتهای من
                                <span class="label label-primary pull-left">8</span>
                            </a>
						</li>
						<li>
                            <a href="#">
                                <span class="glyphicon glyphicon-edit"></span>
                                ویرایش پروفایل
                            </a>
						</li>
						<li>
                            <a href="{{URL::route('admin.auth.logout')}}">
                                <span class="glyphicon glyphicon-off"></span>
                                خروج
                            </a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 col-md-6">
                <div class="content-box">
                    <h4 class="text-center">داشبورد سیستم</h4>
                    <ul class="nav nav-list dash-list">
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                لیست خبرهای سیستم
                                <span class="label label-primary pull-left">500</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-tags"></span>
                                لیست تگ ها
                                <span class="label label-primary pull-left">8</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-user"></span>
                                نقش های کاربری
                                <span class="label label-primary pull-left">4</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-list"></span>
                                لیست کاربران
                                <span class="label label-primary pull-left">800</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-th-list"></span>
                                لیست دسترسی ها
                                <span class="label label-primary pull-left">800</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-file"></span>
                                لاگ سیستم
                                <span class="label label-primary pull-left">800</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-sort-by-order"></span>
                                روند کار ایجاد خبر
                                <span class="label label-primary pull-left">4</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-comment"></span>
                                کامنت ها
                                <span class="label label-primary pull-left">500</span>
                            </a>
                        </li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
@stop

@section('script')
    @parent
    <script type="text/javascript" src="{{ asset('assets/JsLibs/CssSnippets.js') }}"></script>
    <script type="text/javascript">
        /**
         * Make dashboard boxes equal-heighted
         */
        $(document).ready(function(){
            CssSnippets.makeEqualHeight('.content-box');
        });
    </script>
@stop
