@extends('layouts.app')
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

        <a href="/" class="btn btn-light"><i class="fa fa-btn fa-trash fa-fw"></i> Назад</a> 
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

        <a href="{{ route('public.table',$show->id) }}" class="btn btn-warning mb-2"><i class="fa fa-btn fa-trash fa-fw"></i> Таблиця раундів учасників</a> 
            
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
                    @else
                        <i>Раунд завершено</i>
                        <hr>
                        @foreach($player as $key => $value2)    
                            @if($value->win_player_id == $value2->id)
                                
                                <i class="mdi mdi-crown link-icon bg-success p-2 rounded-lg text-white"></i>
                                         {{ $value2->name }}
                               
                            @endif
                        @endforeach
                    @endif
                </div>
         @endforeach
        </div>

   </div>     
    
</div>
@endsection
