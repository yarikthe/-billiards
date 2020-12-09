<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Вхід | Більярд 7 {{ config('app.name', 'Laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.addons.css" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/shared/style.css" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="/assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="https://img.icons8.com/cotton/452/billiard-ball.png" />
  </head>
  <body>
          <header>
            <!--Navbar -->
            <nav class="mb-1 navbar navbar-expand-lg navbar-light orange lighten-1 fixed-top bg-light shadow">
              <a class="navbar-brand" href="#"> 
                <img src="https://img.icons8.com/cotton/452/billiard-ball.png" class="rounded-circle z-depth-0"
                        alt="avatar image" height="35">
                    Більярд - Смірнов
                </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
                aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent-555">
                 <ul class="nav ml-auto">

            <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i>Адміністратор #{{ Auth::user()->id }}</i>    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Вийти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul></li>
          </ul>
              </div>
            </nav>

            </div>
          
        </header>
    <div class="wrapper mt-5 pt-5">
        
      @yield('content')
      
      <div class="auth_footer">
        <p class="text-muted text-center">© 2020. Більярд 7 {{ config('app.name', 'Laravel') }}. </p>
      </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/core.js"></script>
    <script src="/assets/vendors/js/vendor.addons.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="/assets/js/template.js"></script>
    <!-- endbuild -->
  </body>
</html>
