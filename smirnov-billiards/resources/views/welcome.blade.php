<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <title>Більярд - Смірнов | ІПЗм-19-1 </title>

        <!-- Tab icon logo -->
        <link rel="icon" href="https://lh3.googleusercontent.com/proxy/95ginI4iqXZ_ZAW0IPEB_N301yIEkjvElXohGAzRrEo0oW9kwlLywz2IVasr8fKIHFDkw3Byc3tnm0fi6yF6VlJJyxkmNfvNSYg9">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="./css/home.css">

        </style>
    </head>
    <body class="main">

        <header>
            <!--Navbar -->
            <nav class="mb-1 navbar navbar-expand-lg navbar-light orange lighten-1 fixed-top bg-light shadow">
              <a class="navbar-brand" href="#"> 
                <img src="https://lh3.googleusercontent.com/proxy/95ginI4iqXZ_ZAW0IPEB_N301yIEkjvElXohGAzRrEo0oW9kwlLywz2IVasr8fKIHFDkw3Byc3tnm0fi6yF6VlJJyxkmNfvNSYg9" class="rounded-circle z-depth-0"
                        alt="avatar image" height="35">
                    Більярд - Смірнов
                </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
                aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent-555">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="/">Головна
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/about-bilyard">Про біляьрд</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/contact">Контакти</a>
                  </li>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                 <!--  <li class="nav-item avatar">
                    <a class="nav-link p-0" href="#">
                      <img src="https://lh3.googleusercontent.com/proxy/95ginI4iqXZ_ZAW0IPEB_N301yIEkjvElXohGAzRrEo0oW9kwlLywz2IVasr8fKIHFDkw3Byc3tnm0fi6yF6VlJJyxkmNfvNSYg9" class="rounded-circle z-depth-0"
                        alt="avatar image" height="35">
                    </a>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link" href="/login">Вхід</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn  btn-warning" href="/register">Реєстрація</a>
                  </li>
                </ul>
              </div>
            </nav>
            <!--/.Navbar -->
            <!-- Jumbotron Jumbotron -->
            <div class="p-5 mt-5 text-center bg-light bg-header">
                
                <div class="bg-inner">
                    <h1 class="mb-3 mt-5">Більярд - Смірнов</h1>
                </div>
               
            </div>
          
        </header>

        <div class="container-fluid text-left p-3 pt-5">

            <h2>
              Турніри
            </h2>
              <hr>
            <div class="row">

                <div class="now col-md-6">
                @foreach($turnir as $key => $value)
                <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark m-2">
                    <div class="header d-flex justify-content-between mb-2">
                        
                        <a href="{{ route('t.show',$value->id) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>

                        <div class="date p-2">
                            <i>{{ $value->date_start }} - {{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                        
                    </div>
                    
                </div>
            @endforeach
          <hr>
              <h2>
                Минулі турніри (архівні)
              </h2>
              <hr>
              @foreach($turnirold as $key => $value)
                <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark m-2">
                    <div class="header d-flex justify-content-between mb-2">
                        
                        <a href="{{ route('t.show',$value->id) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>

                        <div class="date p-2">
                            <i>{{ $value->date_start }} - {{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                        
                    </div>
                    
                </div>
            @endforeach
                </div>

                <div class="col-md-6">
                  <h2>
                    Гравці
                  </h2>
                  <hr>
                  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Імя</th>
      <th scope="col">Місто</th>
      <th scope="col">Звання</th>
    </tr>
  </thead>
  <tbody>
  </tbody>

                     @foreach($players as $key => $value)                      
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                              <a href="{{ route('p.show',$value->id) }}">{{ $value->name }} <i class="mdi mdi-share link-icon"></i></a>
                            </td>
                            
                            <td> {{ $value->city }}</td>
                            <td> 
                               {{ $value->sportTitul }}
                            </td> 


                        </tr>
                    @endforeach
                    
</table>

                </div>

            </div>
           
           
        </div>
          <!-- Footer Text -->

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3 bg-secondary text-white">© 2020 Copyright:
            <a href="#" class="text-warning"> Більярд - Смірнов </a> | ІПЗм-19-1 
          </div>
          <!-- Copyright -->

        </footer>
        <!-- Footer -->
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </body>
</html>
