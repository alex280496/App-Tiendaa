
@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('styles')
<style >
  .clearfix{
    clear: both;
  }
</style>
@endsection
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/welcome.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section">
      <h2 class="title text-center">Cambiar  informacion de la Categoria</h2>
      <form class="" action="{{url('/admin/categories/'.$category->id.'/edit')}}" method="post" enctype="multipart/form-data"> <!-- la url es la ruta post para el metodo update-->
        {{csrf_field()}}
        <div class="row">
          <div class="col-sm-6">
            	<div class="form-group label-floating">
            		<label class="control-label">Nombre de la Categoria</label>
            		<input type="text" class="form-control" name="name" value="{{$category->name}}">
            	</div>
        </div>

        </div>

        <div class="row mb-4">
          <div class="col-md-12">
          <textarea class="form-control" placeholder="Descripcion" rows="3" name="description">{{$category->description}}</textarea>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-6">
              <img src="{{asset('/images/categories/'.$category->image)}}" alt="" height="150">
              <div class="clearfix"></div>
              <label class="control-label">Imagen de la Categoria</label>
              <input type="file" class="form-control" name="image">
            </div>
        </div>
          <button class="btn btn-primary">Guardar Cambios</button>
          <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>

      </form>

  </div>
</div>

@endsection
