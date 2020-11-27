@extends('layouts.user')
@section('content')
@if ( Auth::user() and Auth::user()->role == "user")

<div class="container-fluid">
<div class="d-flex justify-content-between">
    <div class="info">
        <h1>
            Турніри 
        </h1>
    </div>                      
   </div>
   <hr>
    <div class="d-flex justify-content-between">

    <div class="turnir-past col-md-6">
        <h2 class="text-secondary">
            Минулі турніри ({{ $turnirsclose->count() }})
        </h2>
        <div class="list-turnirs p-2 mt-2">
            @foreach($turnirsclose as $key => $value)
                <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark m-3">
                    <div class="header d-flex justify-content-between mb-2">
                        
                        <a href="{{ route('user.turnir',$value->id) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>
                        
                        <div class="date p-2">
                            <i>{{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                        
                    </div>
                
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="turnir-currnet col-md-6 rounded m-1">
        <h2 class="text-success">
            Поточні турніри ({{ $turnirs->count() }})
        </h2>
        <div class="list-turnirs p-2 mt-2">

            @foreach($turnirs as $key => $value)
                <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark m-3">
                    <div class="header d-flex justify-content-between mb-2">
                        
                        <a href="{{ route('user.turnir',$value->id) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>

                        <div class="date p-2">
                            <i>{{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                        
                    </div>
                </div>
            @endforeach
           
        </div>
    </div>

    </div>
</div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection
