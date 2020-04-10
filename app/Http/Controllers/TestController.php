<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class TestController extends Controller
{
  public function index(){
    $categories=Category::has('products')->get();//para devoler unicamente lascategorias que tienen prodcuots
    return view('welcome')->with(compact('categories'));
  }
}
