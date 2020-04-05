<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function index(){
      $products=Product::paginate(10);
      return view('admin.products.index')->with(compact('products')); //listado de productos
    }
    public function create(){
      return view('admin.products.create'); //formulario de registro
    }
    public function store(){
      //registrar el nuevo producto en la bd

    }
}
