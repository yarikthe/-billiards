@extends('layouts.admin')
 @section('content')
 @if ( Auth::user() and Auth::user()->role == "admin")
 <div class="container">

    <h1>
        Користувачі
    </h1>
    <hr>
    <div class="d-flex justify-content-between">
      <span>Сортування за імям</span> 
      <div class="action row">
                          
        <a href="/admin/users" class="btn btn-outline-secondary"><i class="fa fa-btn fa-arrow-up fa-fw"></i> Всі користувачі</a>
        <a href="/admin/users?role=user" class="btn btn-outline-secondary"><i class="fa fa-btn fa-arrow-up fa-fw"></i> Користувачі</a>
        <a href="/admin/users?role=org" class="btn btn-outline-secondary"><i class="fa fa-btn fa-arrow-down fa-fw"></i> Організатори</a>  
        
      </div>
    </div>
   <hr>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ПІБ</th>
      <th scope="col">Статус</th>
      <th scope="col">Заявка на огранізатора</th>
      <th scope="col">Видалення</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user as $key => $value)
    
      <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>
          <div class="d-flex justify-content-between">
            <div class="img">
              <img src="/uploads/profile/{{$value->avatar}}" class="img-fluid w-50" alt="picture">
            </div>
            <div class="info">
              <b>
                {{
                  $value->name
                }}
              </b>
              <br>
              <samll>
              {{
                  $value->email
                }}
              </samll>
              <br>
              <samll>
              {{
                  $value->phone
                }}
              </samll>
            </div>
          </div>
        </td>
        <td>

                @if($value->role == "org" and $value->role != "admin")
                <small class="text-success">Оранізатор Підтверджений</small>
                @endif

                @if($value->role == "user" and $value->role != "admin")
                  <label>
                    Користувач
                  </label>
                @endif
        </td>
        <td>
                @foreach($claim0 as $key1 => $value2)
                  @if(($value2->user_id == $value->id))
                    <small>Дата: </small>
                    {{
                        $value2->dateClaim
                    }}
                    <br>
                    <small>Назва: </small>
                    {{
                        $value2->company
                    }}

                    <a href="/admin/confirm-org/{{$value->id}}" class="btn btn-success m-1">Підтвердити</a>
                    @endif
                @endforeach

                @foreach($claim1 as $key1 => $value2)
                  @if(($value2->user_id == $value->id))
                   <p>-</p>
                  @endif
                @endforeach
               
        </td>
        <td>
            <a href="/admin/users/delete/{{$value->id}}" class="btn btn-danger m-1">Видалити</a>
        </td>
      </tr>

    @endforeach
  </tbody>
</table>
      
</div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection
