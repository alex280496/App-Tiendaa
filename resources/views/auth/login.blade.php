@extends('layouts.app')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter">
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
      <div class="card card-login">
        <form class="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
          @csrf
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title">Iniciar Sesion</h4>
            
          </div>
          <p class="description text-center">Ingresa tus credenciales</p>
          <div class="avatar text-center">
            <img src="{{asset('/img/login.svg')}}" alt="" width="100">
          </div>
          <div class="card-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">mail</i>
                </span>
              </div>
                <input id="email" placeholder="Email..." type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">lock_outline</i>
                </span>
              </div>
              <input id="password" placeholder="Password..." type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>

          <div class="footer text-center">
            <button type="submit" name="button"  class="btn btn-primary btn-link btn-wd btn-lg">iniciar</button>

          </div>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
