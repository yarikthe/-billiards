@extends('layouts.admin')
@section('content')
@if ( Auth::user() and Auth::user()->role == "admin")

<div class="container">
<div class="d-flex justify-content-between">
   <h1>
   Новий Турнір
   </h1>
    <div class="action">
        <a href="/admin/turnirs" class="btn btn-light"><i class="fa fa-btn fa-trash fa-fw"></i> Назад</a> 
    </div>                        
   </div>
   <hr>
        <form action="/admin/turnir/insert" method="POST">
            @csrf  
            <div class="d-flex justify-content-between">
                <div class="info col-md-6">
                        <div class="form-group"><label>Назва</label>
						  	
                              <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Дайте назву" required>
                            
                        </div>

                        <div class="form-group"><label>Опишіть турнір</label>
                        
                                <textarea name="desc" id="desc" class="form-control" cols="30" rows="5"></textarea>

                        </div>

                        <div class="form-group"><label>Дата початку</label>

                            <input type="date" id="date_start" name="date_start" class="form-control" value="">
                        
                        </div>

                        <div class="form-group"><label>Дата завершення</label>

                            <input type="date" id="date_end" name="date_end" class="form-control" value="">
                        
                        </div>
                </div>

                <div class="player col-md-6">
                    
                    <div class="form-group"><label>Місце проведення</label>
						  	
                              <input type="text" name="place" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Вкажіть місце проведення турніру" required>
                            
                    </div>
                    
                    <div class="form-group"><label>Призовий фонд (min 1000)</label>
                          
                          <input type="number" id="prizMoney" class="form-control" name="prizMoney" min="1000" max="1000000">
                    </div>

                    <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label class="m-1 p-2">Додайте участників</label>
                        <a href="/organizator/new-player" class="btn btn-primary m-2">Новий гравець</a>
                    </div>
                    <div class="overflow-auto bg-light p-2 form-control h-25">
                        @foreach($players as $key => $value)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $value->id }}" name="players_id[]" id="playerID">
                            <label class="form-check-label" for="playerID">
                                {{ $value->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                        
                          
                    </div>

                    <div class="form-group"><label>Опублікувати турнір?</label>
                          
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isPiblic" id="isPublic" value="0" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Я потім опублікую
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isPiblic" id="isPublic" value="1">
                            <label class="form-check-label" for="exampleRadios2">
                                Опублікувати відразу
                            </label>
                        </div>
                          
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
