@extends('layouts.user')
 @section('content')
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            <div class="d-flex justify-content-between mb-5">
              <div class="">
                <h4>Ставки</h4>
              </div>
              <div class="action">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Зробити ставку</a>
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">Поповнити баланс</a>
              </div>
              
            </div>
            <hr>
            <div class="content">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Сума (грн)</th>
                    <th scope="col">Турнір [раунд, гравець]</th>
                    <th scope="col">Виграш</th>
                    </tr>
                </thead>
                <tbody>
                    
                @foreach($stavka as $key => $value)
                
                <tr>
                    <td>
                       <a href="{{ route('stavka.delete',$value->id) }}" class="text-danger">Видалити</a>
                    </td>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                        
                        {{
                            $value->dateStavka
                        }}
                     
                    </td>
                    <td>
                        {{
                            $value->money
                        }} грн
                    </td>
                    <td>
                        @foreach($turnirs as $key => $value2)
                            @if($value2->id == $value->turnir_id)
                                {{
                                    $value2->name
                                }}
                            @endif
                        @endforeach
                        [
                        @foreach($raunds as $key => $value3)
                            @if($value3->id == $value->raund_id)
                          
                                {{
                                    $value3->name
                                }}                    
                            <!-- <label class="text-info">Раунд видалено</label> -->
                       
                            @endif
                        @endforeach
                        ,
                        @foreach($players_raund as $key => $value4)
                            @if($value4->id == $value->player_id) 
                                {{
                                    $value4->name
                                }}
                            @endif
                        @endforeach
                        ]
                    </td>
                    <td>
                        @if($value->isWin == 0)
                        <label class="text-danger"> {{$value->total}} грн</label> <label class="text-danger p-1 rounded">Ви програли</label> 
                        @elseif($value->isWin == 1)
                        <label class="text-success">+{{$value->total}} грн</label>  <label class="text-success p-1 rounded">Виграли</label> 
                        @else
                            <label class="text-info">В процесі</label>
                        @endif
                    </td>
                    
                </tr>

              @endforeach
                    
                </tbody>
                </table>
             
            </div>
          </div>
        </div>


 <!-- Modal Stavka -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Нова ставка</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/user/stavka-insert" method="POST">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="modal-body">
          <input type="text" value="{{ Auth::user()->id }}" hidden name="user_id">
          <input type="number" class="form-control" name="money" min="1" max="1000000" placeholder="Сума ставки" required>
          <div class="form-group">
            <label>Оберіть турнір</label>
            <select class="form-control" id="exampleFormControlSelect1" name="turnir_id" data-dependent="turnir_id" required>
                <option value="0" disabled="true" selected="true">- Оберіть -</option>
                @foreach($turnirs as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach

            </select>
          
          </div>
          <div class="form-group">
            <label>Оберіть раунд</label>
            <select class="form-control" id="exampleFormControlSelect1" name="raund_id" id="raund_id" data-dependent="raund_id" required>
                <option value="0" disabled="true" selected="true">- Оберіть -</option>
            </select>
          
          </div>
          <div class="form-group">
          <label>Оберіть гравця</label>
            <select class="form-control" id="exampleFormControlSelect1" name="player_id" id="player_id" required>
                <option value="0" disabled="true" selected="true">- Оберіть -</option>
            </select>
          
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Сховати</button>
          <button type="submit" class="btn btn-primary">Зробити ставку</button>
        </div>
      </form>
    </div>
  </div>
</div>

 <!-- Modal Balance -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Поповнення балансу</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="user/balance/import/{{Auth::user()->id}}" method="POST">
        @csrf
        <div class="modal-body">
          <input type="text" value="{{ Auth::user()->id }}" hidden name="user_id">
          <input type="number" class="form-control" name="balance" min="100" max="1000000" require>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Сховати</button>
          <button type="submit" class="btn btn-primary">Поповнити</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
