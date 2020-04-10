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
      return view ('search.show')->with(compact('products','query'));

    }
}
