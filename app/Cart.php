<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CartDetail;
class Cart extends Model
{
    public function details(){
      return $this->hasMany(CartDetail::class);
    }


    //crear accesor para el total de valor del pedido a pagar por los roductos
    public function getTotalAttribute(){
      $total=0;
      foreach($this->details as $detail){
        $total+=$detail->quantity*$detail->product->price;
      }
      return $total;
    }

}
