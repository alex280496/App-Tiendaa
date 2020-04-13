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

    //accesor, para definir un campo calculado
    public function getUrlAttribute(){
      //getXAttribute "x" en ves de que se debe poner el mnombre para el campo calculado, emn este caso se llama url
      //esta funcion permite saber si la imagen guardada esta directamente en la bd o esta almacenda localmente
      //en la carpeta images/products esto para  que se pueda visualizar bien en la vista
      if(substr($this->image,0,4)=="http"){//quiere decir que si el atributo image empieza con http, entonces devulve el valor original de la bd
        return $this->image;
      }
      return '/images/products/'.$this->image; //caso contrario devulve la imagen alamacenda de forma local
      //entonces ese atributo url puede ser utlizado directamente en la vista index de iamges
    }
}
