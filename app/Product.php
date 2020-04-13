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

    public function images(){ //utilizado para devolver las imagenes correspondientes a un producto

      return $this->hasMany(ProductImage::class);
    }

    //estamos creando un acceso para poder utilizae en la vista welcome
    public function getFeaturedImageUrlAttribute(){ //este nombre de la funcion es el que se utiliza en la vista
      $featuredImage=$this->images()->where('featured',true)->first();//le decimos qeu busca el la tabla iamges donde el campo featured sea true y devulelva la priemra iamgen
      if(!$featuredImage){ //si no existe la iamgen($featuredImage devuve falso ) que retorne la primera iamegen  asocida al producto
        $featuredImage=$this->images()->first();
      }
      if($featuredImage){
        return $featuredImage-> url;//si existe el campo featured como true que devuelva la propiedad url definida en el model prductImage
                                      //de la funcion getUrlAttribute()
      }
      //default
      return '/images/default.jpg';//si no tiene ninguna imagen el prodcuto que me devuelva la imaegn or default alamecda em public/products.images
    }

    public function getCategoryNameAttribute(){
      if($this->category){
        return $this->category->name;
      }
      return 'General';
    }
}
