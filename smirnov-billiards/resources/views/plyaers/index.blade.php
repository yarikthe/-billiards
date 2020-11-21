@extends('layouts.org')
@section('content')

<div class="container">

   <div class="d-flex justify-content-between">
   <h1>
   Гравці
   </h1>
   <a href="/organizator/new-player" class="btn btn-primary "> Додати гравця</a>
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
                              <a href="{{ route('player.show',$value->id) }}">{{ $value->name }} <i class="mdi mdi-share link-icon"></i></a>
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
                              <a href="{{ route('player.destroy',$value->id) }}" class="btn btn-danger"><i class="fa fa-btn fa-trash fa-fw"></i> Видалити</a> 
                              
                              <a href="{{ route('player.edit',$value->id) }}" class="btn btn-light"><i class="fa fa-btn fa-trash fa-fw"></i> Редагувати</a> 
                            </td>  

                        </tr>
                    @endforeach
                    
</table>
{{ $players->links() }}
@endif
</div>

@endsection