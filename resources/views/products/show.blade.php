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
          </div>
        </div>
      </div>
      <div class="description text-center">
        <p>{{$product->long_description}}</p>
      </div>
      <div class="text-center">
        <button class="btn btn-primary btn-round">
        	<i class="material-icons">add</i> Aniadir al carrito de compras
        </button>
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
@endsection
