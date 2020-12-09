@extends('layouts.org')
@section('content')
@if ( Auth::user() and Auth::user()->role == "org")

<div class="container">
<div class="d-flex justify-content-between">
   <div class="turnir-header">
    <h1>
        Турнір  <label class="text-primary">{{ $show->name }}</label> 
    </h1>
    <p class="text-secondary">
        #{{ $show->id }}
    </p>
   </div>
    <div class="action">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Додати раунд в турнір
        </button>
        <a href="/organizator/turnirs" class="btn btn-light"><i class="fa fa-btn fa-trash fa-fw"></i> Назад</a> 
    </div>                        
   </div>
   <hr>
   <div class="detail-info d-flex justify-content-between">

        <div class="info">

            <h3>
                Інформація про турнір
            </h3>
          
            <br>
            <table>
                <tr>
                    <td>Статус турніра: </td>
                    <td>
                        @if($show->isDone == 1)
                            <label class="btn btn-success"> Турнір Завершений</label>
                        @else
                            <label class="btn btn-primary"> Діючий</label>
                            <a href="{{ route('turnir.close',$show->id) }}" class="btn btn-light">Завершити</a>
                        @endif 
                    </td>
                </tr>
                <tr>
                    <td>
                        Публікація турніра: 
                    </td>
                    <td>
                        @if($show->isPiblic == 1)
                            <label class="btn btn-success"> Турнір опублікований</label>
                            <a href="{{ route('turnir.hidden',$show->id) }}" class="btn btn-light">Скрить</a>
                        @else
                            <label class="btn btn-light"> Не опублікований</label>
                            <a href="{{ route('turnir.public',$show->id) }}" class="btn btn-primary">Опублікувати</a>
                        @endif 
                    </td>
                </tr>
                <tr>
                    <td>Місце проведення:</td>
                    <td> {{ $show->place }}</td>
                </tr>
                <tr>
                    <td>Терміни:</td>
                    <td> {{ $show->date_start }} -  {{ $show->date_end }}</td>
                </tr>
                <tr>
                    <td>Опис турніру:</td>
                    <td> {{ $show->desc }}</td>
                </tr>
                <tr>
                    <td>Призовий фонд (грн):</td>
                    <td>  {{ $show->prizMoney }} грн</td>
                </tr>
                <tr>
                    <td> Учасники:</td>
                    <td> <br>
                        @foreach($players as $key => $value_id)
                            @foreach($player as $key => $value)
                                
                                @if($value_id->player_id == $value->id)
                                    <a href="{{ route('player.show',$value->id) }}"> {{ $value->name }}</a>
                                    (Очкі: {{ $value->countPointStart }})
                                    @if($value->id == $show->win_player_id)
                                        <i class="mdi mdi-crown link-icon bg-success p-2 rounded-lg text-white"></i> Переможець
                                        (Очкі: {{ $show->pointWin }})
                                    @endif
                                    <br>
                                @endif
                            @endforeach
                        @endforeach
                    </td>
                </tr>
            </table>
        
        </div>

        <a href="{{ route('turnir.table',$show->id) }}" class="btn btn-warning mb-2"><i class="fa fa-btn fa-trash fa-fw"></i> Таблиця раундів учасників</a> 
            
        <div class="raunds">

            <h5 class="mb-5">
                Список раундів турніра
            </h5>
        @foreach($raund as $key => $value)
            <div class="card-raund-item bg-white shadow p-2 rounded-lg m-2">

                    <div class="d-flex justify-content-between">
                        <h5>
                          Етап №{{ $value->name }}
                        </h5>
                        {{ $value->dateRaund }}
                    </div>
                    <div class="d-flex justify-content-between">
                    @foreach($player as $key => $value2)
 
                        <div class="players d-flex justify-content-between mr-2">
                            @if($value->player_01_ID == $value2->id)
                                <a href="{{ route('player.show',$value2->id) }}" class="p-1">
                                    {{ $value2->name }}
                                </a>
                            @endif
                          
                            @if($value->player_02_ID == $value2->id)
                                <a href="{{ route('player.show',$value2->id) }}" class="p-1">
                                    {{ $value2->name }}
                                </a>
                            @endif
                        </div>

                    @endforeach
                    </div>
                    @if($value->isDone == 0)
                        <a href="{{ route('turnir.showwin', $value->id) }}" class="btn btn-success">Завершити</a> 
                    @else
                        <i>Раунд завершено</i>
                        <hr>
                        @foreach($player as $key => $value2)    
                            @if($value->win_player_id == $value2->id)
                                <a href="{{ route('player.show',$value2->id) }}" class="p-1">
                                <i class="mdi mdi-crown link-icon bg-success p-2 rounded-lg text-white"></i>
                                         {{ $value2->name }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                    <a href="{{ route('turnir.delete-raund',$value->id) }}" class="btn btn-danger ">Видалити</a>
            </div>
         @endforeach
        </div>

   </div>     
    <hr>
   <a href="{{ route('turnir.delete',$show->id) }}" class="btn btn-danger">Видалити</a>
   <a href="{{ route('turnir.edit',$show->id) }}" class="btn btn-light">Редагувати</a>
    
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Новий раунд</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/organizator/turnir/raund/insert" method="POST">
      @csrf 
        <div class="modal-body">
            <input type="text" hidden value="{{ $show->id }}" name="turnir_id">
            <div class="d-flex justify-content-between">
                <div class="palyer-01">
                    <div class="form-group"><label>Номер турніра (Назва з номером)</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group"><label>Гравець №1</label>
                   
                    <select class="form-control" id="player_01_ID" name="player_01_ID">
                            <option value="0" selected="true" disable="true" >Оберіть</option>
                            @foreach($players as $key => $value_id)
                            @foreach($player as $key => $value)
                                
                                @if($value_id->player_id == $value->id)
                                <option value="{{ $value->id}}" >{{ $value->name }}</option>
                                  
                                @endif
                            @endforeach
                        @endforeach
                    </select>


                          
                    </div>
                    
                    <div class="form-group"><label>Коефіцієнт виграшу</label>
                          
                          <input type="number" id="koefWin01" class="form-control" name="koefWin01" min="1.0" step="0.01" max="100.0">
                    </div>
                </div>

                <div class="palyer-02">
                    <div class="form-group"><label>Дата раунда</label>

                        <input type="date" id="dateRaund" name="dateRaund" class="form-control">

                    </div>
                    <div class="form-group"><label>Гравець №2</label>
						  	
                    <select class="form-control" id="player_02_ID" name="player_02_ID">
                    <option value="0" selected="true" disable="true" >Оберіть</option>
                            @foreach($players as $key => $value_id)
                            @foreach($player as $key => $value)
                                
                                @if($value_id->player_id == $value->id)
                                <option value="{{ $value->id}}" >{{ $value->name }}</option>
                                  
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                            
                    </div>
                    
                    <div class="form-group"><label>Коефіцієнт виграшу)</label>
                          
                          <input type="number" id="koefWin02" class="form-control" name="koefWin02" min="1.0" step="0.01" max="100.0">
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            <button type="submit" class="btn btn-primary">Додати</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Win Modal -->
<div class="modal fade" id="winModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Завершення раунда</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('turnir.win-raund',$value->id) }}" method="POST">
      @csrf 
        <div class="modal-body">
            <input type="text" hidden value="{{ $show->id }}" name="turnir_id">
            <div class="d-flex justify-content-between">
 
                    <div class="point col-md-6">
                        <div class="form-group">
                        <label>Очкі Переможеця</label>
                             <input type="number" id="pointPlayer01" class="form-control" name="pointPlayer01" min="1" max="1000">
                        <label>Очкі програвшого</label>
                             <input type="number" id="pointPlayer02" class="form-control" name="pointPlayer02" min="1" max="1000">
                                
                      </div>
                    </div>   
                    <div class="form-group col-md-6"><label>Переможець</label>
                        <select class="form-control" id="win_player_id" name="win_player_id">
                            
                            @foreach($player as $key => $value)
                                
                                <option value="{{ $value->id }}" >{{ $value->name }}</option>

                            @endforeach
                        </select>
                    </div>

            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            <button type="submit" class="btn btn-success">Підтвердити</button>
        </div>
      </form>
    </div>
  </div>
</div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection
