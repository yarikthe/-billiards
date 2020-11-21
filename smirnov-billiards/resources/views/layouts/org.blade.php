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
                                <i>Організатор #{{ Auth::user()->id }}</i>    {{ Auth::user()->name }}
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
            <img class="profile-img img-lg rounded-circle" src="../assets/images/profile/male/image_1.png" alt="profile image">
          </div>
          <div class="info-wrapper">
            <i>Організатор</i>
            <p class="user-name">{{ Auth::user()->name }}</p>
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">Основне</li>
          <li>
            <a href="/home">
              <span class="link-title">Головна</span>
            </a>
          </li>
          <li>
            <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Турніри</span>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages">
              <li>
                <a href="/organizator/turnir/create-new" target="_blank">Новий турнір</a>
              </li>
              <li>
                <a href="/organizator/turnirs" target="_blank">Всі турніри</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Гравці</span>
            </a>
            <ul class="collapse navigation-submenu" id="ui-elements">
              <li>
                <a href="/organizator/new-player">Новий гравець</a>
              </li>
              <li>
                <a href="/organizator/players">Всі гравці</a>
              </li>
            </ul>
          </li>
          <!--
          <li>
            <a href="pages/forms/form-elements.html">
              <span class="link-title">Статистика</span>
            </a>
          </li>
          <li>
            <a href="pages/charts/chartjs.html">
              <span class="link-title">Ставки</span>
            </a>
          </li>
          <li>
            <a href="pages/icons/material-icons.html">
              <span class="link-title">Прогноз</span>
            </a>
          </li>
          -->
        </ul>

      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
    @yield('content')
     <!-- partial:partials/_footer.html -->
     <footer class="footer">
          <div class="row">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
              <ul class="text-gray">
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2020 <a href="#" target="_blank">Smirnov - Biliard</a>. All rights reserved</small>
              <small class="text-gray mt-2">Made With <i class="mdi mdi-heart text-danger"></i> by Lukyanchuk Media</small>
            </div>
          </div>
        </footer>
        <!-- partial -->
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