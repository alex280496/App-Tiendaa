<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function index(){
      $products=Product::paginate(10);
      return view('admin.products.index')->with(compact('products')); //listado de productos
    }
    public function create(){
      $categories=Category::OrderBy('name')->get();
      return view('admin.products.create')->with(compact('categories')); //formulario de registro
    }
    public function store(Request $request){
      //dd($request->all());
      $product=new Product();
      $product->name=$request->input('name');
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->category_id=$request->input('category_id');
      $product->long_description=$request->input('long_description');

      $product->save();//insert en la abse de datos
      return redirect('/admin/products');//para que una vez guardado el prodcuto muestre el listado de prodcutos


    }
    public function edit($id){
      $product=Product::find($id);
      $categories=Category::OrderBy('name')->get();
      return view('admin.products.edit')->with(compact('product','categories'));
    }
    public function update(Request $request, $id){
      $product=Product::find($id);
      $product->name=$request->input('name');
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->category_id=$request->input('category_id');
      $product->long_description=$request->input('long_description');

      $product->save(); //update en la base de datos
      return redirect('/admin/products');
    }

    public function  delete($id){
      $product=Product::find($id);
      $product->delete();
      return back();
    }

}
