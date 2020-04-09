@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section text-center">
      <h2 class="title">Categorias Disponibles</h2>
      <div class="team">
        <div class="row">
          <a  href="{{url('/admin/categories/create')}}" class="btn btn-primary btn-round mx-auto">Crear nuevo Categoria</a>
          <table class = "table mt-2">
            <thead>
              <tr>
              <th class="col-xs-2"> Nombre </th>
              <th class="col-xs-2">Descripcion </th>
              <th class="col-xs-2"> Opciones </th>
            </tr>
          </thead>
          <tbody>
         @foreach ($categories as $category)
          <tr>
              <td>{{$category->name}}</td>
              <td>{{$category->description}}
              <td class = "td-actions">
                  <a  href="{{url('/categories/'.$category->id)}}" rel = "tooltip" title = "Ver Categoria" class = "btn btn-info btn-simple btn-sm">
                      <i class = "fa fa-info"> </i>
                  </a>
                  <a href="{{url('/admin/categories/'.$category->id.'/edit')}}" rel = "tooltip" title = "Editar Categoria" class = "btn btn-success btn-simple btn-sm">
                      <i class = "fa fa-edit"> </i>
                  </a>
                  <a href="{{url('/admin/categories/'.$category->id.'/delete')}}" rel = "tooltip" title = "Eliminar" class = "btn btn-danger btn-simple btn-sm">
                      <i class = "fa fa-times"> </i>
                  </a>
              </td>
          </tr>
          @endforeach

       </tbody>
        </table>
        {{$categories->links()}}
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
