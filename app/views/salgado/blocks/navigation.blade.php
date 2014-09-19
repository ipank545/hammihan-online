<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
            <!-- SerializeIr on Mobile -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#serialize-main-menu">
                        <span class="sr-only">مشاهده منو</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                <!--a class="logo" href="/" style="height:100%;">پردیسان</a-->
            </div>
        <!-- Serialize visible content on toggle -->
        <div class="collapse navbar-collapse" id="serialize-main-menu">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">داشبورد</a></li>
                <li><a href="series">خبر</a></li>
                <li><a href="films">لاگ</a></li>
                <li><a href="#">مدیریت کاربران</a></li>
            </ul>
            @if( ! Auth::check() )
            <div class="navbar-left call-to-action btn-group auth-buttons">
                <a href="{{URL::to('auth/signup')}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-plus"></i> ثبت نام </a>
                <a href="{{URL::to('auth/signin')}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-user"></i> ورود</a>
            </div>
            @else
            <div class="navbar-left call-to-action btn-group">
                <div class="btn-group">
                    <button type="button" style="border-radius:3px;" class="btn btn-link profile  dropdown-toggle" data-toggle="dropdown">
                        <img class="dash-menu-img img-circle" src="{{asset('files/images/user_default_profile/' . rand(1,7) . '.gif')}}">
                       {{Auth::user()->username}} <span class="glyphicon glyphicon-chevron-down"></span>
                    </button>
                    <ul class="dropdown-menu dash-menu" role="menu">
                        <li><a href="#"><span class="glyphicon glyphicon-dashboard"> </span> داشبورد</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-edit"> </span> ویرایش پروفایل</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-star"> </span> سریال های من</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="glyphicon glyphicon-off"> </span> خروج</a></li>
                    </ul>
                </div>
            </div>
            @endif
            <br>
        </div>
    </div>
</div>
