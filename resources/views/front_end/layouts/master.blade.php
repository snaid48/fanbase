<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"> @yield('title')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
  <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/bootstrap-responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/docs.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/prettyPhoto.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/js/google-code-prettify/prettify.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/flexslider.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/sequence.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/color/default.css') }}" rel="stylesheet">
  <!-- rating -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/rating/jquery.rateyo.min.css')}}">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="{{ asset('assets/ico/ico.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">

  <link href="{{asset('sweetalert/app.css')}} " rel="stylesheet" />



  <!-- =======================================================
    Theme Name: Serenity
    Theme URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- logo -->
          <a class="brand logo" href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
          <!-- end logo -->
          <!-- top menu -->
          <div class="navigation">
            <nav>
              <ul class="nav topnav">
                <li class="dropdown {{(Route::getFacadeRoot()->current()->uri() === 'home') ? 'active' : null}}">
                  <a href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="{{(Route::getFacadeRoot()->current()->uri() === 'news') ? 'active' : null}}">
                  <a href="{{ route('news.index') }}">News</a>

                </li>
                <li class="{{(Route::getFacadeRoot()->current()->uri() === 'event') ? 'active' : null}}">
                  <a href="{{ route('event.index') }}">Event</a>

                </li>
                <li class="{{(Route::getFacadeRoot()->current()->uri() === 'team') ? 'active' : null}}">
                  <a href="{{ route('team.index') }}">Team</a>

                </li>
                <li class="{{(Route::getFacadeRoot()->current()->uri() === 'historical') ? 'active' : null}}">
                  <a href="{{ route('historical.index') }}">Historical</a>

                </li>

                @guest
                            <li >
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                        <li><a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                      </li>
                      @endguest

               
                {{--
                <li>
                  <a href="contact.html">Contact</a>
                </li> --}}
              </ul>
            </nav>
          </div>
          <!-- end menu -->
        </div>
      </div>
    </div>
  </header>
  @yield('content')
  <!-- Footer
 ================================================== -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        {{--
        <div class="span4">
          <div class="widget">
            <h5>Browse pages</h5>
            <ul class="regular">
              <li><a href="#">Work for us</a></li>
              <li><a href="#">Creative process</a></li>
              <li><a href="#">Case study</a></li>
              <li><a href="#">Scaffold awwards</a></li>
              <li><a href="#">Meet the team</a></li>
            </ul>
          </div>
        </div> --}} {{--
        <div class="span4">
          <div class="widget">
            <h5>Recent blog posts</h5>
            <ul class="regular">
              <li><a href="#">Lorem ipsum dolor sit amet</a></li>
              <li><a href="#">Mea malis nominavi insolens ut</a></li>
              <li><a href="#">Minim timeam has no aperiri sanctus ei mea per pertinax</a></li>
              <li><a href="#">Te malorum dignissim eos quod sensibus</a></li>
            </ul>
          </div>
        </div> --}} {{--
        <div class="span4">
          <div class="widget">
            <!-- logo -->
            <a class="brand logo" href="index.html">
							<img src="{{ asset('assets/img/logo-dark.png') }}" alt="">
						</a>
            <!-- end logo -->
            <address>
							<strong>Registered Companyname, Inc.</strong><br>
							 8895 Somename Ave, Suite 600<br>
							 San Francisco, CA 94107<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
						</address>
          </div>
        </div> --}}
      </div>
    </div>
    <div class="verybottom" style="color: white">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>
              <img src="{{ asset('assets/img/logo-dark.png') }}" alt=""> &copy; Timnasku - All right reserved
            </p>
          </div>
          <div class="span6">
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Serenity
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> {{-- Devekop by <a href="#">Dian Sulistyadi</a>              --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript Library Files -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.easing.js') }}"></script>
  <script src="{{ asset('assets/js/google-code-prettify/prettify.js') }}"></script>
  <script src="{{ asset('assets/js/modernizr.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.elastislide.js') }}"></script>
  <script src="{{ asset('assets/js/sequence/sequence.jquery-min.js') }}"></script>
  <script src="{{ asset('assets/js/sequence/setting.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('assets/js/application.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
  <script src="{{ asset('assets/js/hover/jquery-hover-effect.js') }}"></script>
  <script src="{{ asset('assets/js/hover/setting.js') }}"></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>


  <script src="{{asset('sweetalert/index.js')}} "></script>
  <script src="{{asset('sweetalert/sweetalert.min.js')}} "></script>

</body>

</html>