
    @extends('layouts.org')
    @section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Привіт, {{ Auth::user()->name }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        Твій статус:  {{ Auth::user()->role }}
                    </p>

                    <span>
                        email: {{ Auth::user()->email }} 
                    </span>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
