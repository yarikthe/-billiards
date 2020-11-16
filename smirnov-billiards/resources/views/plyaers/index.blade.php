@extends('layouts.app')
@section('content')

<table>
@foreach($players as $key => $value)                      
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td> 
                               <img src="/app/public/files/img/players/{{ $value->photo }}" style="margin-right:10%; width:128px; height:72px; float:left;">
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
                              <a href="{{ route('category.delete', $value->id) }}" class="btn btn-danger"><i class="fa fa-btn fa-trash fa-fw"></i> Видалити</a> 
                            </td>  

                        </tr>
                    @endforeach
</table>

@endsection