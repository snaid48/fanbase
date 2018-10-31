<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('back_end/assets/img/ico.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> @yield('title')

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('back_end/assets/css/bootstrap.min.css')}} " rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('back_end/assets/css/animate.min.css')}}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('back_end/assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('back_end/assets/css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('back_end/assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{asset('back_end/assets/img/sidebar-5.jpg')}}">

            <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                    Fanbase
                </a>
                </div>

                <ul class="nav">
                    {{-- <li {{(Route::getFacadeRoot()->current()->uri() === 'home') ? 'class=active' : null}}>
                        <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                    </li> --}}
                    <li {{(Route::getFacadeRoot()->current()->uri() === 'admin/news') ? 'class=active' : null}}>
                        <a href="{{ url('admin/news')}}">
                        <i class="pe-7s-user"></i>
                        <p>News</p>
                    </a>
                    </li>
                    <li {{(Route::getFacadeRoot()->current()->uri() === 'admin/event') ? 'class=active' : null}}>
                        <a href="{{ url('admin/event')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Event</p>
                    </a>
                    </li>
                    <li {{(Route::getFacadeRoot()->current()->uri() === 'admin/team') ? 'class=active' : null}}>
                        <a href="{{ url('admin/team')}}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Team</p>
                    </a>
                    </li>
                    <li {{(Route::getFacadeRoot()->current()->uri() === 'admin/province') ? 'class=active' : null}}>
                            <a href="{{ url('admin/province')}}">
                            <i class="pe-7s-news-paper"></i>
                            <p>Province</p>
                        </a>
                        </li>
                    <li {{(Route::getFacadeRoot()->current()->uri() === 'admin/historical') ? 'class=active' : null}}>
                        <a href="{{ url('admin/historical')}}">
                        <i class="pe-7s-science"></i>
                        <p>Historical</p>
                    </a>
                    </li>
                    
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                            </li>
                            {{-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Notification 1</a></li>
                                    <li><a href="#">Notification 2</a></li>
                                    <li><a href="#">Notification 3</a></li>
                                    <li><a href="#">Notification 4</a></li>
                                    <li><a href="#">Another notification</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                            </li> --}}
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            {{-- <li>
                                <a href="">
                                    <p>Account</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Dropdown
                                        <b class="caret"></b>
                                    </p>

                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li> --}}
                            <li>

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log out') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>


            @yield('content')


            <footer class="footer">
                <div class="container-fluid">
                    {{-- <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                Home
                            </a>
                            </li>
                            <li>
                                <a href="#">
                                Company
                            </a>
                            </li>
                            <li>
                                <a href="#">
                                Portfolio
                            </a>
                            </li>
                            <li>
                                <a href="#">
                               Blog
                            </a>
                            </li>
                        </ul>
                    </nav> --}}
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>

        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="{{asset('back_end/assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('back_end/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{asset('back_end/assets/js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('back_end/assets/js/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('back_end/assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{asset('back_end/assets/js/demo.js')}}"></script>

{{-- <script type="text/javascript">
    $(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
</script> --}}

</html>