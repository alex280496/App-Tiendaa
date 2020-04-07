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

    //accesor, es un campo calculado
    public function getUrlAttribute(){ //esta funcion permite saber si la imagen guardada esta directamente en la bd o esta almacenda localmente
                                      //en la carpeta images/products esto para  que se pueda visualizar bien en la vista
      if(substr($this->image,0,4)=="http"){
        return $this->image;
      }
      return '/images/products/'.$this->image;
    }
}
