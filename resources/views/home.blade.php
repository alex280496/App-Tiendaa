
@extends('layouts.app')
@section('body-class','profile-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/welcome.jpg')}}')">

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

      <h4 class="text-center">Te presentamos tu carrito de compras actual</h4>
      <p class="text-center">Puedes agregar mas productos a tu carrito de compras y realizar el pedido al administrador</p>
 <!--
 cart es un campo calculado que estamso definiendo en el modelo usuario
          con este nombre getCartAttribute, entonces me permite obtener el carro y con este
    los datos del detalle con el nombre details que es la realcion definida
    en el modelo cart para la relacion   (auth()->user()->cart->details as $detail
  -->
  <hr>
  <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos</p>
  <!--imprimimos la cantidad de detalles que el carrito tiene, esto con el metod count -->

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
  <!--ACCEDEMOS AL USUARIO QUE ESTA AUTENTICADO, A SU CARRITO DE PRODUCTOS  ACTIVO Y PARTIR SUS DETALLES Y RECORREMOS LOS DETALLES -->
  <!--cart es el campo calcualdo qeu devuelve el carro activo del prodcuot -->
  <!-- details es la relacion definica en le modelo cart y cart puede tener muchos details-->
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
<p> <strong> Valor total a pagar:</strong> {{auth()->user()->cart->total}} dolares</p>
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
