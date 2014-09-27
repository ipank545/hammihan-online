<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" lang="fa">
<head>
	@include('hammihan.sections.metas')
    @include('hammihan.sections.stylesheets')
    @include('hammihan.sections.header_scripts')
</head>
<body>
    @include('hammihan.sections.header')
    @yield('home_content')
    @yield('article_content')
    @yield('post_list_content')
    @yield('about_us_content')
    @yield('contact_us_content')
    @include('hammihan.sections.footer')
    @include('hammihan.sections.scripts')
</body>
</html>
