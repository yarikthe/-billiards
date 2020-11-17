@extends('layouts.org')
@section('content')

<div class="container-fluid">
<div class="d-flex justify-content-between">
   <h1>
   Турніри 
   </h1>
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
            Минулі турніри (8)
        </h2>
        <div class="list-turnirs p-2 mt-2">
            <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark">
                <div class="header d-flex justify-content-between mb-2">
                    <h3>Назва</h3>
                 
                    <div class="date p-2">
                    <i>11-22-22</i>  - <i>11-22-22</i> 
                    </div>
                </div>
                <div class="body d-flex justify-content-between mb-2">
                    <div class="content">
                    <b>Kiev</b>
                    </div>
                    <a href="" class="btn btn-light">Видалити</a>
                </div>
               
            </div>
        </div>
    </div>
    
    <div class="turnir-currnet col-md-4 rounded m-1">
        <h2 class="text-success">
            Поточні турніри (2)
        </h2>
        <div class="list-turnirs p-2 mt-2">

            @foreach($turnirs as $key => $value)
                <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark">
                    <div class="header d-flex justify-content-between mb-2">
                        <h3>{{ $value->name }}</h3>
                        <div class="date p-2">
                            <i>{{ $value->date_end }}</i> 
                        </div>
                        
                    </div>
                    <div class="body d-flex justify-content-between mb-2">
                    
                        <b>{{ $value->place }}</b>

                        <a href="" class="btn btn-success">Завершити</a>
                        
                    </div>
                
                </div>
            @endforeach
           
        </div>
    </div>

    <div class="turnir-future col-md-4 rounded m-1">
        <h2 class="text-primary">
            Майбутні турніри (1)
        </h2>
        <div class="list-turnirs p-2 mt-2">
            <div class="card-turnir shadow p-2 bg-light rounded-lg text-dark">
                <div class="header d-flex justify-content-between mb-2">
                    <h3>Назва</h3>
                    <div class="date p-2">
                        <i>11-22-22</i> 
                    </div>
                </div>
                <div class="body d-flex justify-content-between mb-2">
                   
                    <b>Kiev</b>
                    
                    <a href="" class="btn btn-primary">Відмінити</a>
                                
                </div>
               
            </div>
        </div>
    </div>

    </div>
</div>

@endsection
