<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produt;
class CartDetail extends Model
{
  //CartDetail N      1 Product
  //un carrito de compras pertenece a un producto determinado
    public function product(){
      return $this->belongsTo(Product::class);
    }
}
