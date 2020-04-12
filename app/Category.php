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

    public function getFeaturedImageUrlAttribute(){ //acceso para acceder a los prodctos asociados a este categoria y al primero de allos
      if($this->image)
        return '/images/categories/'.$this->image;
      //else
      $featuredProduct=$this->products()->first();
      if($featuredProduct)
        return $featuredProduct->featured_image_url;//esto devulve la imagen destacada del primero de los productod

      return 'images/default.jpg';

    }

}
