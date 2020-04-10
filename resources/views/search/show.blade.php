@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')

@section ('styles')
 <style>
   .team{
     padding-bottom: 50px;
   }
 </style>
@endsection
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile">
            <div class="avatar">
              <img src="{{$category->featured_image_url}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
            </div>

            <div class="name">
              <h3>{{$category->name}}</h3>
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
        <p>{{$category->description}}</p>
      </div>


    <!-- aqui va la lista de prodcuos correspondientes a esa categoria-->
    <div class="team text-center">
      <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
          <div class="team-player">
            <div class="card card-plain">
              <div class="col-md-6 ml-auto mr-auto">
                <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
              </div>
              <h4 class="card-title">
                <a href="{{url('/products/'.$product->id)}}">{{$product->name}}</a>
                <br>
              </h4>
              <div class="card-body">
                <p>{{$product->description}}</p>
              </div>

            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center">
        {{$products->links()}}
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
