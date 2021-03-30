<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('/welcome', ['products'=> $products]);
    }

    public function productdetail($id)
    {
        $result = Product::where('id',$id)->first();;
        return view('/productdetail', ['product' => $result]);
       
    }

}
