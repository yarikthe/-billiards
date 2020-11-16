
    @extends('layouts.org')
    @section('content-org')



<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
        sd
        </div>

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
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: red;">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
