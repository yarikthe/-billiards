 @extends('layouts.user')
 @section('content')
 @if ( Auth::user() and Auth::user()->role == "user")

      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            <div class="d-flex justify-content-between mb-5">
              <div class="">
                <h4>Кабінет</h4>
                <p class="text-gray">Добро пожаловать користувач, {{ Auth::user()->name }}</p>
              </div>
              @if(empty($claim))
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Стати огранізатором</a>
              @else
                <Label class="text-success">Заявка подана</Label>
              @endif
            </div>
            <div class="content">
              Перейдіть до відпоміного пункта меню зліва.
            </div>
          </div>
        </div>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Заявка на статус організатора</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="user/want-be-org" method="POST">
        @csrf
        <div class="modal-body">
          <input type="text" value="{{ Auth::user()->id }}" hidden name="user_id">
          <input type="text" class="form-control" name="company">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Сховати</button>
          <button type="submit" class="btn btn-primary">Подати заявку</button>
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
