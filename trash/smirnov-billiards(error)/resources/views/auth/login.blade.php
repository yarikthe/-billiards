@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-12 logo-section">
          <a href="/" class="logo">
            <img src="https://img.icons8.com/cotton/452/billiard-ball.png" alt="logo" />
            <h1>Більярд 7</h1>
          </a>
        </div>
      </div>
<div class="row">
        <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
          <div class="grid shadow">
            <div class="grid-body">
              <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-group input-rounded">
                       <input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group input-rounded">
                      <input id="password" type="password" placeholder="Пароль" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запамятати мене') }}
                                    </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Віхд') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                                        {{ __('Забули пароль?') }}
                                    </a>
                                @endif
                  </form>
                  <div class="signup-link">
                    <p>Досі не маєш свого аккаунта?</p>
                    <a href="/register">Реєстрація</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
