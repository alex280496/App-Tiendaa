<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request){
      $query=$request->input('query');
      $products=Prdoduct::find('name','like',"%$query%")->get();//significa que se va hacer la busqueda de todas las letras
                                                  //por ejemplo si solo pone letras inciales o finales del producto, igual se vaa buscar
      return view ('')->with(compact('products'));

    }
}
