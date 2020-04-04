<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //una Categoria puede tener muchos productos
    //$category->products
    public function products(){
      return $this->hasMany(Product::class);
    }

}
