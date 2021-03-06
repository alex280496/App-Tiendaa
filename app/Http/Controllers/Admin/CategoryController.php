<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;
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

    if($request->hasFile('image')){
      $file=$request->file('image');
      $path=public_path().'/images/categories';
      $fileName=uniqid().'-'.$file->getClientOriginalName(); //getClientOriginalName contiene el nombre original incluida la extension
      $moved=$file->move($path,$fileName);//si se ejecuta correctamente moved tendra el valor de true

      //entonces acualizamos para guardar la imagen de la categoria
      if($moved){
        $category->image=$fileName;
        $category->save();//insert en la bd
      }
    }
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
    if($request->hasFile('image')){
      $file=$request->file('image');
      $path=public_path().'/images/categories';
      $fileName=uniqid().'-'.$file->getClientOriginalName(); //getClientOriginalName contiene el nombre original incluida la extension
      $moved=$file->move($path,$fileName);//si se ejecuta correctamente moved tendra el valor de true

      //entonces acualizamos para guardar la imagen de la categoria
      if($moved){
        $previosPath=$path.'/'.$category->image;
        $category->image=$fileName;
        $saved=$category->save();//insert en la bd
        if($saved)//una vez actualizado, tenemos que elimianr la imagen anterior
          File::delete($previosPath);
      }
    }
    return redirect('/admin/categories');
  }

  public function  delete($id){
    $category=Category::find($id);
    $pathdelete=public_path().'/images/categories/'.$category->image;
    $deleted=$category->delete();
    if($deleted){
      File::delete($pathdelete);
    }
    return back();
  }
}
