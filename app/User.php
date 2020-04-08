<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Cart;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts(){ //para definir que un usuario puede tener muchos carritos de compras
      return $this->hasMany(Cart::class);
    }

    //vamoa a definir un accesor pra el campo user_id del CartDetailController
    public function getCartAttribute()
    {
      $cart=$this->carts()->where('status','Active')->first();   //   $this->carts obtenemos todos los carros asociados a este usuario
      if($cart){ //si existe el dato osea un carrito activo entonces retorna el id del carro
        return $cart;
      }
      else{ //caso contrario  se crea un nuevo carro asigano valores a los campos, se guarda y retorna el id
        $cart =new Cart();
        $cart->status='Active';
        $cart->user_id=$this->id;
        $cart->save();
        return $cart;

      }

    }
}
