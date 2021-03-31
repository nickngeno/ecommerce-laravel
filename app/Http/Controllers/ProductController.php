<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

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
    public function search(Request $request)
    {
        $results = Product::where('name','like','%'.$request->input('name').'%')->get();
        return view('/searchresults',['results' => $results]);
    }
    public function addtocart(Request $request) 
    {
        if($request->session()->has('user')){
            $id= $request->session()->get('user')->id;
            $cart =  new Cart();
            $cart->user_id = $id;
            $cart->product_id = $request->product_id;
            
            $cart->save();
            return redirect('/products');
        }else{
            return redirect('login');
        }
       
    }

}
