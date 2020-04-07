@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section text-center">
      <h2 class="title">Imagenes del producto "{{$product->name}}"</h2>
      <div class="card">
        <div class="card-body">
          <form class="" action="{{url('admin/products/'.$product->id.'/images')}}" method="post" enctype="multipart/form-data">
            <!--enctype="multipart/form-data" para que permita la subida de archivos-->
            {{csrf_field()}}
            <input type="file" name="photo" value="" class="mr-3" required>
            <button  type="submit" class="btn btn-primary btn-round mx-auto">Subir nueva Imagen</button>
            <a href="{{url('/admin/products')}}" class="btn btn-default btn-round mx-auto"> Ver listado de Productos</a>
          </form>
        </div>
      </div>

      <div class="row">
          @foreach($images as $image)
          <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <img src="{{$image->url}}" alt="Imagen del producto">
              <button type="submit" name="button" class="btn btn-warning btn-round">Eliminar Imagen</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>

  </div>
</div>

@endsection
