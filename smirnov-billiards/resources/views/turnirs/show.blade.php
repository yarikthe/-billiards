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
        <a href="/organizator/turnirs/raunds/generate" class="btn btn-primary"><i class="fa fa-btn fa-trash fa-fw"></i> Згенерувати раунди</a> 
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
                            <label class="btn btn-light"> Діючий</label>
                            <a href="{{ route('turnir.public',$show->id) }}" class="btn btn-primary">Опублікувати</a>
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

        </div>

   </div>     
    <hr>
   <a href="{{ route('turnir.delete',$show->id) }}" class="btn btn-danger">Видалити</a>
   <a href="{{ route('turnir.edit',$show->id) }}" class="btn btn-light">Редагувати</a>
    
</div>

@endsection
