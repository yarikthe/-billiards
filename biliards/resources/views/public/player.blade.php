@extends('layouts.app')
@section('content')

<div class="container">

<hr>
<div class="d-flex justify-content-between">
   <h1>
   Гравць <b class="text-primary">{{ $player->name }}</b>
   </h1>
   <a href="/" class="btn btn-secondary">Назад</a>         
   </div>
   
   <hr>
    <div class="d-flex justify-content-between">

    <div class="photo-profile col-md-6">
        <img src="/uploads/players/{{ $player->photo }}" class="img-fluid img-thumbnail" style="width: 250px; height:250px;"> 
    </div>
    
    <div class="info-profile col-md-6">
    <div class="form-group"><label>ПІБ</label>
						  	
                              <input type="text" readonly name="name" value="{{ $player->name }}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="ПІБ" required>
                            
                       <label>Дата народження</label>
                        <input type="date" id="dateBorn" readonly value="{{ $player->dateBorn }}" name="dateBorn" class="form-control" value="">
                        </div>
                        <div class="form-group"><label>Звання спортивне</label>
                            
                              <input type="text" name="sportTitul"  readonly value="{{ $player->sportTitul }}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Спортивне звання" required>
                            
                        </div>
                        <div class="form-group"><label>Місто</label>
                            
                              <input type="text" name="city" readonly value="{{ $player->city }}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Місто" required>
                            
                        </div>

                        <div class="form-group"><label>Почткові очки</label>
                        
                              <input type="number" id="countPointStart" readonly value="{{ $player->countPointStart }}" name="countPointStart" min="100" max="1000">
                        </div>
    </div>

    </div>
</div>

@endsection