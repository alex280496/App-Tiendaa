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
            <!--enctype="multipart/form-data" para que permita la subida de archivos sin importar el tipo-->
            <!--si el action esta vacio significa que la ruta va a ser la misma a la que estamos ubicados actualmente la peticion se hace a una ruta
          igual a al que esata por defecto -->
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
              <img src="{{$image->url}}" alt="Imagen del producto" width="300">
               <form class="" action="{{url('/admin/products/'.$product->id.'/images')}}" method="post">
                 {{csrf_field()}}
                 {{ method_field('DELETE')}} <!--le indicamos qeu se trata de una peticion de tipo delere-->
                 <input type="hidden" name="image_id" value="{{$image->id}}">
                 <button type="submit" name="button" class="btn btn-warning btn-round">Eliminar Imagen</button>
                 @if($image->featured)
                   <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen descatada del producto" >
                     <!--mandamos el ide del producto y el id de la iamegn  para saber eque la imagen esta asocida bcon este producto-->
                        <i class="material-icons">favorite</i>
                    </button>
                 @else
                   <a href="{{url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                     <!--mandamos el ide del producto y el id de la iamegn  para saber eque la imagen esta asocida bcon este producto-->
                        <i class="material-icons">favorite</i>
                    </a>
                 @endif

               </form>

            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>

  </div>
</div>

@endsection
