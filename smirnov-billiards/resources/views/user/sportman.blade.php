@extends('layouts.user')
 @section('content')
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            <div class="d-flex justify-content-between mb-5">
              <div class="">
                <h4>Спортсмени</h4>
              </div>
              <hr>
            </div>
            <div class="content">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">ПІБ</th>
                    <th scope="col">Звання</th>
                    <th scope="col">Очкі</th>
                    </tr>
                </thead>
                <tbody>
                    
                @foreach($players as $key => $value)
                
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                        <a href="{{ route('user.profile',$value->id) }}" class="text-primary">
                        {{
                            $value->name
                        }}
                        </a>
                    </td>
                    <td>
                        {{
                            $value->sportTitul
                        }}
                    </td>
                    <td>
                        {{
                            $value->countPointStart
                        }}
                    </td>
                </tr>

              @endforeach
                    
                </tbody>
                </table>
             
            </div>
          </div>
        </div>


@endsection
