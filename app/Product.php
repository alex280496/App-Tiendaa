<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //para consultar a que catgoria pertenence un producto determinado

    //$product->category
    public function category(){
      //un producto pertenene a una sola categoria
      return $this->belongsTo(Category::class);
    }
    //$product->images
    //un producto puede tener muchas imagenes

    public function images(){
      
      return $this->hasMany(ProductImage::class);
    }
}
