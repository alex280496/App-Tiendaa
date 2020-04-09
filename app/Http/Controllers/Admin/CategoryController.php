<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
  public function index(){
    $categories=Category::OrderBy('name')->paginate(10);
    return view('admin.categories.index')->with(compact('categories')); //listado de productos
  }
  public function create(){
    return view('admin.categories.create'); //formulario de registro
  }
  public function store(Request $request){
    //dd($request->all());
    $category=new Category();
    $category->name=$request->input('name');
    $category->description=$request->input('description');

    $category->save();//insert en la abse de datos
    return redirect('/admin/categories');//para que una vez guardado el prodcuto muestre el listado de prodcutos


  }
  public function edit($id){
    $category=Category::find($id);
    return view('admin.categories.edit')->with(compact('category'));
  }
  public function update(Request $request, $id){
    $category=Category::find($id);
    $category->name=$request->input('name');
    $category->description=$request->input('description');

    $category->save(); //update en la base de datos
    return redirect('/admin/categories');
  }

  public function  delete($id){
    $category=Category::find($id);
    $category->delete();
    return back();
  }
}
