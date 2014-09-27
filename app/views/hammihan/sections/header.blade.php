@section('header')
    <div class="container-fluid">
        <div class="row">
            <div class="t-nav">
                <nav class="navbar navbar-default mb0" role="navigation" >
    		        <div class="navbar-header">
    			        <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#navbar-collapse-1">
    				        <span class="sr-only">Toggle navigation</span>
    				        <span class="icon-bar"></span>
    				        <span class="icon-bar"></span>
    				        <span class="icon-bar"></span>
    			        </button>
    			        <div class="pull-left hidden-sm hidden-lg hidden-md">
    			            <div class="logo1"><img src="{{ asset('assets/hammihan/images/hammihan-online.png') }}" /></div>
    			        </div>
    		        </div>
    		        <div class="collapse navbar-collapse " id="navbar-collapse-1">
    			        <ul class="nav navbar-nav">
                            <li class="dropdown">
    					        <a href="#" class="dropdown-toggle" data-toggle="dropdown">جستجو</a>
    					        <ul class="dropdown-menu">
    						        <form class="navbar-form" role="search">
    							        <div class="input-group">
    								        <input type="text" class="form-control" placeholder="Search">
    								        <span class="input-group-btn">
    									        <button class="btn btn-default" type="button">بگرد</button>
    								        </span>
    							        </div>
    						        </form>
    					        </ul>
    				        </li>
    				        <li class="active"><a href="index.html">صفحه اصلی</a></li>
    						<li><a href="#">درباره ما</a></li>
    				        <li><a href="contact.html">تماس با ما</a></li>
    				    </ul>
    				    <div class="pull-left omid hidden-lg hidden-md"> </div>
    		        </div>
    	        </nav>
            </div>
        </div>
    </div>
@show
