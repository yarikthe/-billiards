@extends('layouts.admin')
 
@section('content')
@if ( Auth::user() and Auth::user()->role == "admin")
    <div class="container-fluid">
 
        <div class="panel panel-primary">
 
         <div class="panel-heading">
                 <div class="col-md-8 col-sm-12">
                     <h1>Статистика - графіки</h1>
            </h5>
                 </div>
         </div>

         <hr>
 
          <div class="panel-body">    
            <div class="row">
 
            <br/><br/>
            
            <div class="col-md-6"> 
               {!! $pie_chart->html() !!}<hr>
            </div>

            <div class="col-md-6"> 
               {!! $areaspline_chart->html() !!}<hr>
            </div>
 
            <br/><br/>

            <div class="col-md-6"> 
               {!! $line_chart->html() !!}<hr>
            </div>

            <div class="col-md-6"> 
               {!! $donut_chart->html() !!}<hr>
            </div>
 
            <br/><br/>
          </div>
         
        </div>
 
    </div>
 
    {!! Charts::scripts() !!}
 
    {!! $pie_chart->script() !!}

    {!! $line_chart->script() !!}

    {!! $areaspline_chart->script() !!}

    {!! $donut_chart->script() !!}
    


@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection