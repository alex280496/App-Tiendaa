
@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/welcome.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section">
      <h2 class="title text-center">Editar informacion del Producto</h2>
      <form class="" action="{{url('/admin/products/'.$product->id.'/edit')}}" method="post"> <!-- la url es la ruta post para el metodo update-->
        {{csrf_field()}}
        <div class="row">
          <div class="col-sm-6">
            	<div class="form-group label-floating">
            		<label class="control-label">Nombre del producto</label>
            		<input type="text" class="form-control" name="name" value="{{$product->name}}">
            	</div>
        </div>
          <div class="col-sm-6">
          	<div class="form-group label-floating">
          		<label class="control-label">Precio</label>
          		<input type="number" step="0.01" class="form-control" name="price" value="{{$product->price}}">
          	</div>
        </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group label-floating">
              <label class="control-label">Descripcion</label>
              <input type="text" class="form-control" name="description" value="{{$product->description}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group label-floating">
              <label class="control-label">Categoria</label>
              <select class="form-control" name="category_id">
                <option value="0">General</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}} </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-12">
          <textarea class="form-control" placeholder="Descripcion larga" rows="5" name="long_description">{{$product->long_description}}</textarea>
          </div>
        </div>
          <button class="btn btn-primary">Guardar Cambios</button>
          <a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar</a>

      </form>

  </div>
</div>
@endsection
