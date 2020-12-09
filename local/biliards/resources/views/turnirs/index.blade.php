@extends('layouts.org')
@section('content')
@if ( Auth::user() and Auth::user()->role == "org")

<div class="container-fluid">
<div class="d-flex justify-content-between">
    <div class="info">
        <h1>
            Турніри 
        </h1>
        <p>
           <!-- 
            <br>
            Всі турніри є публічними - доступними для не зареєстрованих користувачів.
            <br>
            Відмінити - зробити турнір не публічним для всіх користувачів.
            -->
        </p>
    </div>
   
    <div class="action">
        <a href="/organizator/turnir/create-new" class="btn btn-primary"><i class="fa fa-btn fa-trash fa-fw"></i> Створити</a> 
    </div>                        
   </div>
   <hr>
   <div class="filter-by-public">
    <form action="" method="GET">

    </form>
   </div>
    <div class="d-flex justify-content-between">

    <div class="turnir-past col-md-4">
        <h2 class="text-secondary">
            Минулі турніри ({{ $turnirsclose->count() }})
        </h2>
        <div class="list-turnirs p-2 mt-2">
            @foreach($turnirsclose as $key => $value)
                <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark">
                    <div class="header d-flex justify-content-between mb-2">
                        
                        <a href="{{ route('turnir.show',$value->id) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>
                        
                        <div class="date p-2">
                            <i>{{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                        
                    </div>
                    <hr>
                    <div class="action-public d-flex justify-content-between mb-2">
                        @if($value->isPiblic == 1)
                            <a href="{{ route('turnir.hidden',$value->id) }}" class="btn btn-light">Скрить</a>
                        @else
                            <a href="{{ route('turnir.public',$value->id) }}" class="btn btn-primary">Опублікувати</a>
                        @endif 
                        <a href="{{ route('turnir.delete',$value->id) }}" class="btn btn-light">Видалити</a>
                    </div>
                
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="turnir-currnet col-md-4 rounded m-1">
        <h2 class="text-success">
            Поточні турніри ({{ $turnirs->count() }})
        </h2>
        <div class="list-turnirs p-2 mt-2">

            @foreach($turnirs as $key => $value)
                <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark">
                    <div class="header d-flex justify-content-between mb-2">
                        
                        <a href="{{ route('turnir.show',$value->id) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>

                        <div class="date p-2">
                            <i>{{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                        
                    </div>
                    <hr>
                    <div class="action-public d-flex justify-content-between mb-2">
                        @if($value->isPiblic == 1)
                            <a href="{{ route('turnir.hidden',$value->id) }}" class="btn btn-light">Скрить</a>
                        @else
                            <a href="{{ route('turnir.public',$value->id) }}" class="btn btn-primary">Опублікувати</a>
                        @endif 
                        <a href="{{ route('turnir.close',$value->id) }}" class="btn btn-success">Завершити</a>
                        
                    </div>
                </div>
            @endforeach
           
        </div>
    </div>

    <div class="turnir-future col-md-4 rounded m-1">
        <h2 class="text-primary">
            Майбутні турніри ({{ $turnirfuture->count() }})
        </h2>
        
        <div class="list-turnirs p-2 mt-2">
            <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark">
            @foreach($turnirfuture as $key => $value)
                    <div class="header d-flex justify-content-between mb-2">
                        
                        <a href="{{ route('turnir.show',$value->id) }}">
                            <h3>{{ $value->name }}</h3>
                        </a>
                        
                        <div class="date p-2">
                            <i>{{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                    </div>
                    <hr>
                    <div class="action-public d-flex justify-content-between mb-2">
                        @if($value->isPiblic == 1)
                            <a href="{{ route('turnir.hidden',$value->id) }}" class="btn btn-light">Скрить</a>
                        @else
                            <a href="{{ route('turnir.public',$value->id) }}" class="btn btn-primary">Опублікувати</a>
                        @endif 
                        
                  
                    </div>
                </div>
            @endforeach
               
            </div>
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
