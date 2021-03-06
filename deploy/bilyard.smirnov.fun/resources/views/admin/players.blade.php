@extends('layouts.admin')
@section('content')
@if ( Auth::user() and Auth::user()->role == "admin")

<div class="container">

   <div class="d-flex justify-content-between">
   <h1>
   Гравці
   </h1>

   </div>
   
   <hr>
   @if(empty($players))
      <p>
      Гравців немає!
       </p>
   @else
   
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Фото</th>
      <th scope="col">Імя</th>
      <th scope="col">Місто</th>
      <th scope="col">Звання</th>
      <th scope="col">Дата народження</th>
      <th scope="col">Очкі</th>
    </tr>
  </thead>
  <tbody>
  </tbody>

                     @foreach($players as $key => $value)                      
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td> 
                             
                               <img src="/uploads/players/{{ $value->photo }}" alt="{{ $value->photo }}" class="rounded w-50">
                            </td>

                            <td>
                              <a href="{{ route('admin.show',$value->id) }}">{{ $value->name }} <i class="mdi mdi-share link-icon"></i></a>
                            </td>
                            
                            <td> {{ $value->city }}</td>
                            <td> 
                               {{ $value->sportTitul }}
                            </td> 
                            <td> 
                               {{ $value->dateBorn }}
                            </td> 
                            <td> 
                               {{ $value->countPointStart }}
                            </td> 
                            <td class="text-right">
                              <a href="{{ route('admin.destroy',$value->id) }}" class="btn btn-danger"><i class="fa fa-btn fa-trash fa-fw"></i> Видалити</a> 
                              
                              <a href="{{ route('admin.edit',$value->id) }}" class="btn btn-light"><i class="fa fa-btn fa-trash fa-fw"></i> Редагувати</a> 
                            </td>  

                        </tr>
                    @endforeach
                    
</table>
{{ $players->links() }}
@endif
</div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection