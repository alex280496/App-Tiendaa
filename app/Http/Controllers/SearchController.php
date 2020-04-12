<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class SearchController extends Controller
{
    public function show(Request $request){
      $query=$request->input('query');
      $products=Product::where('name','like',"%$query%")->paginate(5);//significa que se va hacer la busqueda de todas las letras
                                                  //por ejemplo si solo pone letras inciales o finales del producto, igual se vaa buscar
      if($products->count()==1){
        $id=$products->first()->id;
        return redirect("/products/$id"); //esto quire decir qeu si el resulatdo de la busqueda
                                              //es solo un producto entonces se redirige automaticamnete a la vista de este producto
      }
      return view ('search.show')->with(compact('products','query'));


    }
    public function data(){
      $products=Product::pluck('name');  //pluck, para obtener solo los nombres de todos los productos
      return $products;
    }


}
