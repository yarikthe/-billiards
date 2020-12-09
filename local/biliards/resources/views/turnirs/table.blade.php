@extends('layouts.org')
@section('content')
@if ( Auth::user() and (Auth::user()->role == "org" or Auth::user()->role == "user" or Auth::user()->role == "admin"))

    <div class="container-fluid">

        <h1>
            Таблиця турніру <u>{{ $turnir->name }}</u>
        </h1>
        <hr>
        <div class="row">
        <div class="col-md-3 desc-turnir">
            <p>
               Опис: <b>{{ $turnir->desc}}</b>
            </p>
            <p>
              Призовий фонд: <b>{{ $turnir->prizMoney}}</b>
            </p>
            <p>
              Місце проведення: <b> {{ $turnir->place}}</b>
            </p>
            <p>
              Дати проведення: <b> {{ $turnir->date_start}} -  {{ $turnir->date_end }}</b>
            </p>
            <p>
              Організатор:  <b>{{ $user->name}}</b>
            </p>
            <p>
                Учасники:
                <br>
                @foreach($setPlayer as $key => $value_id)
                            @foreach($player as $key => $value)
                                
                                @if($value_id->player_id == $value->id)
                                <b><a href="{{ route('player.show',$value->id) }}"> {{ $value->name }}</a>
                                    (Очкі: {{ $value->countPointStart }})</b> 
                                    @if($value->id == $turnir->win_player_id)
                                     <b>  <i class="mdi mdi-crown link-icon bg-success p-2 rounded-lg text-white"></i> Переможець
                                        (Очкі: {{ $turnir->pointWin }})</b> 
                                    @endif
                                    <br>
                                @endif
                            @endforeach
                        @endforeach
            </p>
        </div>
        <div class="col-md-9">

<table>
@foreach($raund as $key => $value)
<tr>  
    <td>
    <br>
    Raund {{$value->name}}
    @foreach($raund as $keyR => $valueR)
  
        @if($value->name ==  $valueR->name and $key == $keyR)
        
            <br>

            <div class="card-item-table p-2 rounded-lg shadow"> 
                <div class="d-flex justify-content-between">
                    @foreach($player as $key3 => $value3)
                
                        @if($value->player_01_ID == $value3->id)

                        Player1 -
                            {{
                                $value3->name
                            }} 
                            <br>
                        @endif
                        
                        @if($value->player_02_ID == $value3->id)

                        Player2 -
                            {{
                                $value3->name
                            }} 
                            <br>
                        @endif
                        
                        @if($value->win_player_id == $value3->id )

                        
                            <u class="p-1 bg-info">Win -{{
                                $value3->name
                            }} </u>
                            <br>
                        @endif
                        
                    @endforeach
                </div>
            </div>
           
        @else
            </td>
            
            <td>
        @endif
   @endforeach
   </td>
</tr>
@endforeach

</table>


</div>

        </div>
    </div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection
