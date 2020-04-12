
@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section">
      <h2 class="title text-center">Dashboard</h2>
      @if (session('notification'))
          <div class="alert alert-success" role="alert">
              {{ session('notification') }}
          </div>
      @endif

      <ul class="nav nav-pills nav-pills-icons" role="tablist">
    <!--
        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
    -->
    <li class="nav-item active">
        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
            <i class="material-icons">dashboard</i>
            CARRITO DE COMPRAS
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
            <i class="material-icons">list</i>
            PEDIDOS REALIZADOS
        </a>
    </li>
</ul>

 <!--
 cart es un campo calculado que estamso definiendo en el modelo usuario
          con este nombre getCartAttribute, entonces me permite obtener el carro y con este
    los datos del detalle con el nombre details que es la realcion definida
    en el modelo cart para la relacion   (auth()->user()->cart->details as $detail
  -->
  <hr>
  <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos</p>
  <table class = "table mt-2">
    <thead>
      <tr>
      <th>Imagen</th>
      <th> Nombre </th>
      <th> Precio </th>
      <th>Cantidad</th>
      <th>Subtotal</th>
      <th> Opciones </th>
    </tr>
  </thead>
  <tbody>
  @foreach (auth()->user()->cart->details as $detail)
  @if($detail)
  <tr>
      <td>
        <img src="{{$detail->product->featured_image_url}}" alt="" height="60px"> <!-- product es al funcion de relacion definida en el modelo cartdetail-->
      </td>
      <td>
        <a href="{{url('/products/',$detail->product->id)}}" target="_blank">{{$detail->product->name}}</a>
       </td>
      <td > &euro; {{$detail->product->price}} </td>
      <td> ${{$detail->quantity}}</td>
      <td>${{$detail->quantity * $detail->product->price}}</td>
      <td class = "td-actions">
         <form class="" action="{{url('/cart')}}" method="post">
           {{csrf_field()}}
           {{method_field('DELETE')}}
           <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
           <a  href="{{url('/products/'.$detail->product->id)}}"  target="_blank" rel="tooltip" title="Ver Producto" class = "btn btn-info btn-simple btn-sm">
               <i class = "fa fa-info"> </i>
           </a>
           <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-sm">
               <i class="fa fa-times"> </i>
           </button>
         </form>

      </td>
  </tr>
  @endif
  @endforeach
</tbody>
</table>
<div class="text-center">
  <form class="" action="{{url('/order')}}" method="post">
    {{csrf_field()}}
    @if(auth()->user()->cart->details->count()>0)
      <button class="btn btn-primary btn-round">
       <i class="material-icons">done</i> Realizar Pedido
      </button>
    @endif
  </form>

</div>

    </div>
  </div>
</div>
@endsection
