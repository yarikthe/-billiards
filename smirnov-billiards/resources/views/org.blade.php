
    @extends('layouts.org')
    @section('content')
    @if ( Auth::user() and Auth::user()->role == "org")

        <div class="container-fluid d-flex justify-content-between">

        
            <div class="statistics p-2 bg-white shadow rounded-lg col-md-4 m-1">
                <h2>
                    Статистика
                  
                </h2>
                <hr>
            </div>

            <div class="turnirs p-2   rounded-lg  col-md-4 m-1">
                <h2>
                    Турніри
                </h2>
                <hr>
                @foreach($turnirs as $key => $value)
                <div class="card-turnir shadow p-2 bg-white rounded-lg text-dark m-3">
                    <div class="header d-flex justify-content-between mb-2">
                        
                        <a href="{{ route('turnir.show',$value->id) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>

                        <div class="date p-2">
                        <i>{{ $value->date_start }}</i> - <i>{{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                        @if($value->isPiblic == 1)
                            <label class="btn btn-success"> Турнір опублікований</label>
                            <a href="{{ route('turnir.hidden',$value->id) }}" class="btn btn-light">Скрить</a>
                        @else
                            <label class="btn btn-light"> Не опублікований</label>
                            <a href="{{ route('turnir.public',$value->id) }}" class="btn btn-primary">Опублікувати</a>
                        @endif 
                    </div>
                    
                </div>
            @endforeach
            </div>

            <div class="prediction p-2 bg-white shadow rounded-lg  col-md-4 m-1">
                <h2>
                    Прогнозування
                </h2>
                <hr>
            </div>
        
        
        </div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif

    @endsection
