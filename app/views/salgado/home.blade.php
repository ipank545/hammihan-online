@extends('salgado.layouts.master')
@section('content')
	<div class="main">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-6 col-md-6">
	                <h3 class="text-primary">آخرین سریال های بروز شده</h3>
	            </div>
	            <div class="col-lg-6col-md-6">
	                <form class="form-inline pull-left" style="padding-top:10px;">
	                    <div class="form-group">
	                        <input class="form-control search-box" type="text" placeholder="همیشه جتسجو کنید...">
	                    </div>
	                </form>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-12">
	                <a href="#" class="btn btn-primary btn-sm">جدیدترین</a>
	                <a href="#" class="btn btn-link btn-sm">پرطرفدارترین</a>
	            </div>
	        </div>
	    </div>
	</div>
@stop
