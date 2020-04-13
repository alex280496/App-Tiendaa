<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Pedido realizado</title>
</head>
<body>
    <p>Hola! Se ha reportado un nuevo pedido .</p>
    <p>Estos son los datos del cliente que ha realizado el pedido:</p>
    <hr>
    <ul>
        <li>Nombre: {{ $datosuser->name }}</li>
        <li>E-mail: {{ $datosuser->email }}</li>

    </ul>
    <hr>
    <p>Detalles del pedido relizado:</p>
    <ul>
      @foreach (auth()->user()->cart->details as $detail)
      <li>
        Producto: {{$detail->product->name}} - Cantidad:  {{$detail->quantity}}
        (Precio de los productos: {{$detail->quantity *$detail->product->price}})
      </li>

     @endforeach
    </ul>
    <p>
      <strong>Importe total a pagar: </strong>{{auth()->user()->cart->total}} dolares
    </p>



</body>
</html>
