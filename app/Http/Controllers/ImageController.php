<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
class ImageController extends Controller
{
    public function index($id){
      $product=Product::find($id);
      $images=$product->images;

      return view('admin.products.images.index')->with(compact('product','images'));
    }
    public function store(Request $request,$id){
      //guardar la imagen en el proyecto
      $file=$request->file('photo'); //obtiene el archivo que se sube y se guarda con el nombre de file
      $path=public_path().'/images/products'; //es la ruta donde se va gurdar la imagen le concatenamos al directorio public_path() una carpeta para las imagnes
      $fileName=uniqid().$file->getClientOriginalName();//crea un nombre unico para al imagen concotentando con el nombre la imagen
      $file->move($path,$fileName);//mover el archivo en ese path(ruta) con el filename (nombre de archivo)


      //crear un registro en la tabla product_images
      $productImage=new ProductImage();
      $productImage->image=$fileName;
      $productImage->featured=false;
      $productImage->product_id=$id;

      $productImage->save();//insert en la bd
      return back();
    }
    public function destroy(){

    }
}
