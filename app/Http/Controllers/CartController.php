<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCallReceived;
class CartController extends Controller
{
    //debe sonvertir el carrito de compras activo en un pedido pendiente
    //apra que el adminstardor decida si aprobarlo o cancelarlo

    public function update(){
      //accedmos al usuario qeu a iniciaod sesion qeu es el cliente ,a partir del usuario accedmos a su carrito de comparas actual
      //y vamos a guradar elcarro en otra variable para modificar el campo activo a pendiente;

      //para el envio de email
      $admin ='omareyes-96@hotmail.com';//correo del administrador
      //traer lod datos de la bd para mostran en  el correo
      $datoscart=auth()->user()->cart->details();
      //dd($datoscart);
      $datosuser=auth()->user();
      Mail::to($admin)->send(new OrderCallReceived($datosuser));

      $cart=auth()->user()->cart;
      $cart->status='Pending';
      $cart->save();//update


      $notification='Tu pedido se a registrado correctamente, te contactaremos pronto via email';
      return back()->with(compact('notification'));
    }
}
