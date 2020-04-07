<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;
class ImageController extends Controller
{
    public function index($id){
      $product=Product::find($id);
      $images=$product->images()->orderBy('featured','desc')->get();

      return view('admin.products.images.index')->with(compact('product','images'));
    }
    public function store(Request $request,$id){
      //guardar la imagen en el proyecto
      $file=$request->file('photo'); //obtiene el archivo que se sube y se guarda con el nombre de file
      $path=public_path().'/images/products'; //es la ruta donde se va gurdar la imagen le concatenamos al directorio public_path() una carpeta para las imagnes
      $fileName=uniqid().$file->getClientOriginalName();//crea un nombre unico para al imagen concotentando con el nombre la imagen
      $moved=$file->move($path,$fileName);//mover el archivo en ese path(ruta) con el filename (nombre de archivo)
     //la varible moved me devulve true o false si es verdad se hae el registro en la base de datood

      //crear un registro en la tabla product_images
      if($moved){
        $productImage=new ProductImage();
        $productImage->image=$fileName;
        $productImage->featured=false;
        $productImage->product_id=$id;

        $productImage->save();//insert en la bd
      }
        return back();

    }
    public function destroy(Request $request,$id){

        //eliminar el archivo
        $productImage=ProductImage::find($request->input('image_id'));
        if(substr($productImage->image,0,4)=="http"){
          $deleted=true;
        }else{
          $fullpath=public_path().'/images/products/'.$productImage->image;
          $deleted=File::delete($fullpath);// deleted devuleve true si elimina el archivo fisico
        }
        //eliminar el registro de la imagen en la base de datos
        if($deleted){
          $productImage->delete();
        }
        return back();
    }

    public function select($id,$image){
      ProductImage::where('product_id',$id)->update([ //lo que hace es bucar las imagenes con ese id del producto y poner el campo fatured a false
                'featured'=>false               //esto para que ninguna image sea destacda y destacar a continuacion
      ]);
      $productImage=ProductImage::find($image); //busca la imagen con ese id $image
      $productImage->featured=true; //pone el campo featured como true
      $productImage->save();//guarda los cambios
      return back();

    }
}
