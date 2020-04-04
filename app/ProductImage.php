<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //productimage ->product

    public function product(){
      //para saber a que producto le pertenece cada iamgen
      return $this->belongsTo(Product::class);
    }
}
