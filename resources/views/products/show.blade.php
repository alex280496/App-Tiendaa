@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile">
            <div class="avatar">
              <img src="{{$product->featured_image_url}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
            </div>

            <div class="name">
              <h3>{{$product->name}}</h3>
              <h6>{{$product->category->name}}</h6>
            </div>
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
          </div>
        </div>
      </div>
      <div class="description text-center">
        <p>{{$product->long_description}}</p>
      </div>
      <div class="text-center">
        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
        	<i class="material-icons">add</i>Añadir productos al carrito de compras
        </button>
        <a href="{{url('/admin/products')}}" class="btn btn-default btn-round">Ver listado de Productos</a>
      </div>

      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile-tabs">

            <div class="tab-pane active text-center gallery" id="studio">
              <div class="row">

                  @foreach($images as $image)

                  <div class="col-md-2 ml-auto">
                    <img src="{{$image->url}}" class="rounded">
                  </div>
                  @endforeach


              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

        <!-- Modal -->
        <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione la cantidad de productos que desee agregar</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="" action="{{url('/cart')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="modal-body">
                  <input type="number" name="quantity" value="1" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                </div>
              </form>

            </div>
          </div>
        </div>

@endsection
