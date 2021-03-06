@extends('layouts.app')
@section('body-class','login-page sidebar-collapse') <!--para definir un estilo y no herede pr defecto el de app esto pra login y register -->
@section('content')
<div class="page-header header-filter">
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
      <div class="card card-login">
        <form class="form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" >
          @csrf
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title">Registro de Datos</h4>
            <!--
            <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link">
                <i class="fa fa-google-plus"></i>
              </a>
            </div> -->
          </div>
          <p class="description text-center">Completa tu Informacion</p>
          <div class="card-body">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">face</i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus>
            </div>

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
              <input id="password" placeholder="Contraseña..." type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">lock_outline</i>
                </span>
              </div>
              <input placeholder="Confirmar Contraseña..." type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
            </div>

          <div class="footer text-center">
            <button type="submit" name="button"  class="btn btn-primary btn-link btn-wd btn-lg">Registrarse</button>

          </div>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>
</div>


@endsection
