<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function show($id){
      $category=Category::find($id);
      $products=$category->products()->paginate(10); //estamos almacenando en la variable products todos los productos asociados a la categoria encontrada
      return view ('categories.show')->with(compact('category','products'));
    }
}
