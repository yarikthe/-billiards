<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Smirnov - Billiards</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/vendors/iconfonts/mdi/css/materialdesignicons.css">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="/assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="https://img.icons8.com/cotton/452/billiard-ball.png" />

  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="index.html">
          <img class="logo" src="https://img.icons8.com/cotton/452/billiard-ball.png" alt="">
          <img class="logo-mini" src="https://img.icons8.com/cotton/452/billiard-ball.png" alt="">
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
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
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="/uploads/profile/{{Auth::user()->avatar}}" alt="profile image">
          </div>
          <div class="info-wrapper">
            <i>Адміністратор</i>
            <p class="user-name">{{ Auth::user()->name }}</p>
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">Меню</li>
          <li>
            <a href="/home">
              <span class="link-title">Головна</span>
            </a>
          </li>
          <li>
            <a href="/admin/users">
              <span class="link-title">Користувачі</span>
            </a>
          </li>
          <li>
            <a href="/admin/players">
              <span class="link-title">Гравці</span>
            </a>
          </li>
          <li>
            <a href="/admin/turnirs">
              <span class="link-title">Турніри</span>
            </a>
          </li>
          
          <li>
            <a href="/statistics">
              <span class="link-title">Статистика</span>
            </a>
          </li>
          <li>
            <a href="/admin/forecast">
              <span class="link-title">Прогноз *</span>
            </a>
          </li>
         
        </ul>

      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
    @yield('content')

      </div>
      <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/core.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="/assets/js/charts/chartjs.addon.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="/assets/js/template.js"></script>
    <script src="/assets/js/dashboard.js"></script>
    <!-- endbuild -->
  </body>
</html>