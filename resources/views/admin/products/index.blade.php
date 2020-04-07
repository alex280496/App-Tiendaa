@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section text-center">
      <h2 class="title">Productos Disponibles</h2>
      <div class="team">
        <div class="row">
          <a  href="{{url('/admin/products/create')}}" class="btn btn-primary btn-round mx-auto">Crear nuevo Producto</a>
          <table class = "table mt-2">
            <thead>
              <tr>
              <th class="col-xs-2"> Nombre </th>
              <th class="col-xs-2">Descripcion </th>
              <th class="col-xs-2" >Categoria </th>
              <th class = "text-right col-xs-2"> Precio </th>
              <th class="col-xs-2"> Opciones </th>
            </tr>
          </thead>
          <tbody>
         @foreach ($products as $product)
          <tr>

              <td>{{$product->name}}</td>
              <td>{{$product->description}}
              <td> {{$product->category ? $product->category->name :'General'}} </td>
              <td class = "text-right"> &euro; {{$product->price}} </td>
              <td class = "td-actions">
                  <a  href="{{url('/products/'.$product->id)}}" rel = "tooltip" title = "Ver Producto" class = "btn btn-info btn-simple btn-sm">
                      <i class = "fa fa-info"> </i>
                  </a>
                  <a href="{{url('/admin/products/'.$product->id.'/edit')}}" rel = "tooltip" title = "Editar Producto" class = "btn btn-success btn-simple btn-sm">
                      <i class = "fa fa-edit"> </i>
                  </a>
                  <a  href="{{url('/admin/products/'.$product->id.'/images')}}" rel = "tooltip" title = "Imagenes" class = "btn btn-warning btn-simple btn-sm">
                      <i class = "fa fa-image"> </i>
                  </a>
                  <a href="{{url('/admin/products/'.$product->id.'/delete')}}" rel = "tooltip" title = "Eliminar" class = "btn btn-danger btn-simple btn-sm">
                      <i class = "fa fa-times"> </i>
                  </a>
              </td>
          </tr>
          @endforeach

       </tbody>
        </table>
        {{$products->links()}}
        </div>
      </div>
    </div>

  </div>
</div>
<footer class="footer footer-default">
  <div class="container">
    <nav class="float-left">
      <ul>
        <li>
          <a href="https://www.creative-tim.com">
            Creative Tim
          </a>
        </li>
        <li>
          <a href="https://creative-tim.com/presentation">
            About Us
          </a>
        </li>
        <li>
          <a href="http://blog.creative-tim.com">
            Blog
          </a>
        </li>
        <li>
          <a href="https://www.creative-tim.com/license">
            Licenses
          </a>
        </li>
      </ul>
    </nav>

  </div>
</footer>
@endsection
