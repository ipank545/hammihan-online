@extends('hammihan.masters.master')
@section('home_content')
<div class="container">
    <div class="row clearfix">
        @include('hammihan.pages.home.partials.header')
    </div>
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
            @include('hammihan.pages.home.partials.right_panel')
    	</div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            @include('hammihan.pages.home.partials.middle_panel')
        </div>
    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
            @include('hammihan.pages.home.partials.left_panel')
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
            {{ View::make('hammihan.pages.home.partials.category_item' , ['item' => $cats['club']])}}<!-- باشگاه -->
    	</div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
            {{ View::make('hammihan.pages.home.partials.category_item' , ['item' => $cats['calendar']])}} <!--   تقویم -->
    	</div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
            {{ View::make('hammihan.pages.home.partials.category_item' , ['item' => $cats['cafe']])}} <!-- کافه -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
           {{ View::make('hammihan.pages.home.partials.category_item' , ['item' => $cats['worldGroups']])}} <!--   احزاب جهان  -->
    	</div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
           {{ View::make('hammihan.pages.home.partials.category_item' , ['item' => $cats['echo']])}} <!-- پژواک -->
    	</div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
            {{ View::make('hammihan.pages.home.partials.category_item' , ['item' => $cats['network']])}} <!-- شبکه -->
    	</div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
            {{ View::make('hammihan.pages.home.partials.category_item' , ['item' => $cats['bazaar']])}} <!-- بازار -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
            {{ View::make('hammihan.pages.home.partials.category_item' , ['item' => $cats['counter']])}} <!-- پیشخوان -->
    	</div>
    </div>
</div>
@stop
