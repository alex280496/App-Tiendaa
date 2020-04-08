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

    return back();
  }

}
