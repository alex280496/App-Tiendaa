<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
      $category=Category::find($id);
      return view ('categories.show')->with(compact('category'));
    }
}
