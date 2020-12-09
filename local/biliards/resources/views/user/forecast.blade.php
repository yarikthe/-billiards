@extends('layouts.user')
 @section('content')
 @if ( Auth::user() and Auth::user()->role == "user")

      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            <div class="d-flex justify-content-between mb-5">
              <div class="">
                <h4>Прогнози</h4>
              </div>
            </div>
            <hr>
            <div class="content">

                прогнозування
             
            </div>
          </div>
        </div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif

@endsection
