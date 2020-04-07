<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id){
      return " mostar datos del prdoucto cn id $id";
    }
}
