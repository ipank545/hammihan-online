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
                <li class="{{ Menu::is('admin.dash.index') ? 'active' : '' }}"><a href="{{ URL::route('admin.dash.index')}} ">داشبورد</a></li>
                <li class="{{ Menu::is('admin.permissions.index') ? 'active' : '' }}"><a href="{{ URL::route('admin.permissions.index') }}">مجوزهای کاربری</a></li>
                <li class="{{ Menu::is('admin.roles.index') ? 'active' : '' }}"><a href="{{ URL::route('admin.roles.index') }}">نقش های کاربری</a></li>
                <li><a href="#">مدیریت کاربران</a></li>
            </ul>
            @if( ! Auth::check() )
            <div class="navbar-left call-to-action btn-group auth-buttons">
                <a href="{{URL::to('auth/signup')}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-plus"></i> ثبت نام </a>
                <a href="{{URL::to('auth/signin')}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-user"></i> ورود</a>
            </div>
            @else
            <div class="navbar-left call-to-action btn-group" style="margin-top: 28px;">
                <div class="btn-group">
                    <button type="button" style="border-radius:0px;" class="btn btn-default profile-btn" data-toggle="modal" data-target="#profileModal">
                       <span class="glyphicon glyphicon-user"></span> {{$currentUser->identifier()}}
                    </button>
                    <a href="{{URL::route('admin.auth.logout')}}" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span> خروج</a>
                </div>
            </div>
            @endif
            <br>
        </div>
    </div>
</div>
