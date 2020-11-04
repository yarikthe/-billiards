@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->email }} <br>
                    {{ Auth::user()->name }} <br>
                    {{ Auth::user()->phone }} <br>
                    {{ Auth::user()->role }} <br>
                    {{ __('You are logged in!') }} 

                    Зробити перевірку на роль, і до відповіднох ролі надавити view в шаблоні контента

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
