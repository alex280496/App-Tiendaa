<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
class CartDetailController extends Controller
{
  public function store(Request $request){
    $cartDetail=new CartDetail();
    $cartDetail->cart_id=auth()->user()->cart->id;// va a darnos el id del carriro del compras  activo asociado al usuario
                                                //esto gracias a l metodo obtenido en la lcase user  getCardIdAttribute()
    $cartDetail->product_id=$request->input('product_id');
    $cartDetail->quantity=$request->input('quantity');
    $cartDetail->save();
    $notification='El producto se a cargado a tu carrito de compras exitosamente';
    return back()->with(compact('notification'));//le pasamos una varible de sesion flash a la ruta anterior es decir la vista de info del producto
                                              ///al metodo show del productController
  }
  public function destroy(Request $request){
    $cartDetail=CartDetail::find($request->cart_detail_id); //buscamos el cart detail con el id del campo hiiden de la vista home
    //para ver si el cart detal id  que qeuremos eliminar pertenece al carrito de compras activo del usuairo
    //exige que el detalle que se quiere eliminar pertenezca a un carrito de compras que sea igual al id del carrito de compras
    //activo del usario qeu esta haciendo la peticion es decir del usuaio que a iniciado sesion
    //solamente si coincide se va a poder eliminar, de este manera se eviata qe los usuairos eliminen carrtos de otros usuarios

    if($cartDetail->cart_id==auth()->user()->cart->id){
      $cartDetail->delete();
    }

    $notification='El producto se ha elimiando del carrito de compras correctamente';
    return back()->with(compact('notification'));
  }

}
