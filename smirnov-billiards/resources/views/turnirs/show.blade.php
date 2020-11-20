@extends('layouts.org')
@section('content')

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

        <div class="raunds">

            <a href="/organizator/turnirs/{id}/map-table-rounds" class="btn btn-warning mb-2"><i class="fa fa-btn fa-trash fa-fw"></i> Таблиця раундів учасників</a> 
            
            <br>

            list of rounds

            <div class="card-raund-item bg-white shadow p-2 rounded-lg">
                <h5>
                    Raund #1
                </h5>
                <div class="d-flex justify-content-between">

                    <div class="players d-flex justify-content-between mr-2">
                        <a href="#" class="p-1">Name 1</a>
                        <br>
                        <i class="p-1">VS</i>
                        <br>
                        <a href="#" class="p-1">Name 2</a>
                    </div>

                    <a href="#" class="btn btn-danger">Видалити</a>
                    

                </div>
            </div>

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
      <form action="" method="POST">
        <div class="modal-body">
            
            <div class="d-flex justify-content-between">
                <div class="palyer-01">
                    <div class="form-group"><label>Гравець №1</label>
                   
                    <select class="form-control" id="palyer_1">
                        @foreach($player as $key => $value)
                            
                            <option value="{{ $value->id}}" >{{ $value->name }}</option>

                        @endforeach
                    </select>


                          
                    </div>
                    
                    <div class="form-group"><label>Коефіцієнт виграшу</label>
                          
                          <input type="number" id="koefPlayer1" class="form-control" name="koefPlayer1" min="1000" max="1000000">
                    </div>
                </div>

                <div class="palyer-01">
                    <div class="form-group"><label>Гравець №2</label>
						  	
                    <select class="form-control" id="palyer_2">
                        @foreach($player as $key => $value)
                            
                            <option value="{{ $value->id}}" >{{ $value->name }}</option>

                        @endforeach
                    </select>
                            
                    </div>
                    
                    <div class="form-group"><label>Коефіцієнт виграшу)</label>
                          
                          <input type="number" id="koefPlayer2" class="form-control" name="koefPlayer2" min="1000" max="1000000">
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            <button type="button" class="btn btn-primary">Додати</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
