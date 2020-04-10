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
              <img src="{{asset('img/search.png')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
            </div>

            <div class="name">
              <h3 class="title">Resultados de la busqueda</h3>
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
        <p>Se encontrarn {{$products->count()}} resultados para el termino {{$query}}</p>
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


@endsection
