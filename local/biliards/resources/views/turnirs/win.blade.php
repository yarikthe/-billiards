
@extends('layouts.org')
@section('content')
@if ( Auth::user() and Auth::user()->role == "org")


     <div class="container col-md-8">

        <h2>
            Визначення переможця раунда {{ $raund->name }}, #{{ $raund->id }}
        </h2>
        <hr>
        <form action="{{ route('turnir.win-raund', $raund->id) }}" method="POST">
      @csrf 
        <div class="modal-body">
            <input type="text" hidden value="{{ $raund->turnir_id }}" name="turnir_id">
            <div class="d-flex justify-content-between">
 
                    <div class="point col-md-6">
                        <div class="form-group">
                        <label>Очкі Переможеця</label>
                             <input type="number" id="pointPlayer01" class="form-control" name="pointPlayer01" min="1" max="1000">
                        <label>Очкі програвшого</label>
                             <input type="number" id="pointPlayer01" class="form-control" name="pointPlayer01" min="1" max="1000">
                                
                      </div>
                    </div>   
                    <div class="form-group col-md-6"><label>Переможець</label>
                        <select class="form-control" id="win_player_id" name="win_player_id">
                            
                            @foreach($player as $key => $value)
                                @if($raund->player_01_ID == $value->id || $raund->player_02_ID == $value->id) 
                                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Підтвердити</button>
        </div>
      </form>
     </div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection
