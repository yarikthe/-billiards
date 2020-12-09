@extends('layouts.org')
@section('content')
@if ( Auth::user() and Auth::user()->role == "org")

<div class="container">
<div class="d-flex justify-content-between">
   <h1>
   Редагування турніра {{ $edit->name }}
   </h1>
    <div class="action">
        <a href="/organizator/turnir/show/{{ $edit->id }}" class="btn btn-light"><i class="fa fa-btn fa-trash fa-fw"></i> Назад</a> 
    </div>                        
   </div>
   <hr>
        
            
                <div class="players-new">
                <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="btn btn-success m-2"" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Додати гравця в турнір
                                    </a>
                                </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                <form action="/organizator/turnir/insert-players" method="POST">
                                @csrf  
                                    <input type="text" value="{{ $edit->id}}" hidden name="t_id">
                                    @foreach($players as $key => $value)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $value->id }}" name="players_id[]" id="playerID">
                                            <label class="form-check-label" for="playerID">
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-success">Додати</button>
                                </form>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
						  
         
						 
            <form action="{{ route('turnir.update',$edit->id) }}" method="POST">
            @csrf  
            <div class="d-flex justify-content-between">
                <div class="info col-md-4">
                        <div class="form-group"><label>Назва</label>
						  	
                              <input type="text" id="name" name="name" value="{{ $edit->name }}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Дайте назву" required>
                            
                        </div>

                        <div class="form-group"><label>Опишіть турнір</label>
                        
                                <textarea name="desc" id="desc" class="form-control" cols="30" rows="5">{{ $edit->desc }}</textarea>

                        </div>

                        <div class="form-group"><label>Дата початку</label>

                            <input type="date" id="date_start" value="{{ $edit->date_start }}" name="date_start" class="form-control" value="">
                        
                        </div>

                        <div class="form-group"><label>Дата завершення</label>

                            <input type="date" id="date_end" value="{{ $edit->date_end }}" name="date_end" class="form-control" value="">
                        
                        </div>
                </div>

                <div class="player col-md-4">
                    
                    <div class="form-group"><label>Місце проведення</label>
						  	
                              <input type="text" name="place" value="{{ $edit->place }}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Вкажіть місце проведення турніру" required>
                            
                    </div>
                    
                    <div class="form-group"><label>Призовий фонд (min 1000)</label>
                          
                          <input type="number" id="prizMoney" value="{{ $edit->prizMoney }}" class="form-control" name="prizMoney" min="1000" max="1000000">
                    </div>

                    <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label class="m-1 p-2">Додайте участників</label>

                        
                    </div>
                    <div class="overflow-auto bg-light p-2 form-control h-25">
                        Вже у турнірі: <hr>
                        @foreach($players as $key => $value)
                            @foreach($player as $key => $user)

                                @if($value->id == $user->player_id)
                                 
                                    <div class="d-flex justify-content-between">
                                       <h6 class="m-1 p-2" for="playerID">
                                            <a href="{{ route('player.show',$value->id) }}"> {{ $value->name }}</a>
                                        </h6>
                                        <a href="{{ route('turnir.remove',$value->id) }}" class="btn btn-danger m-1">Видалити</a>
                                    </div>
                                    <hr>
                                    
                                    
                                @endif
                                
                            @endforeach
                          
                      
                        @endforeach
                    </div>
                        
                          
                    </div>

                    <div class="form-group"><label>Опублікувати турнір?</label>
                        
                        @if($edit->isPiblic == 1)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isPiblic" id="isPublic" value="1" checked>
                                <label class="form-check-label" for="exampleRadios2">
                                    Опублікувати відразу
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isPiblic" id="isPublic" value="0">
                                <label class="form-check-label" for="exampleRadios1">
                                    Я потім опублікую
                                </label>
                            </div>
                        @else           
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isPiblic" id="isPublic" value="1">
                                <label class="form-check-label" for="exampleRadios2">
                                    Опублікувати відразу
                                </label>
                            </div>             
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isPiblic" id="isPublic" value="0" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Я потім опублікую
                                </label>
                            </div>
                        @endif
                          
                    </div>

                </div>
            </div>
						  <button type="submit" class="btn btn-success">Зберегти</button>   
            </form>

        

    
</div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection
