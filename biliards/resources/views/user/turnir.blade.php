@extends('layouts.user')
@section('content')
@if ( Auth::user() and Auth::user()->role == "user")

<div class="container pt-5 mt-5">
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
        <a href="/user/turnirs" class="btn btn-light"><i class="fa fa-btn fa-trash fa-fw"></i> Назад</a> 
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
                        @else
                            <label class="btn btn-light"> Не опублікований</label>
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
                                    <a href="{{ route('user.profile',$value->id) }}"> {{ $value->name }}</a>
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
                            {{ $value->name }}
                        </h5>
                        {{ $value->dateRaund }}
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                    @foreach($player as $key => $value2)
 
                        <div class="players d-flex justify-content-between mr-2">
                            @if($value->player_01_ID == $value2->id)
                                <a href="{{ route('user.profile',$value2->id) }}" class="p-1">
                                    {{ $value2->name }}
                                    </a><br>Коефіцієнт:
                                    {{ $value->koefWin01 }}
                                
                            @endif
                            
                          
                            @if($value->player_02_ID == $value2->id)
                                <a href="{{ route('user.profile',$value2->id) }}" class="p-1">
                                    {{ $value2->name }}
                                    </a> <br>Коефіцієнт:
                                    {{ $value->koefWin02 }}
                                
                            @endif
                        </div>

                    @endforeach
                    </div>
                </div>
         @endforeach
        </div>

   </div>     
    
</div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection
