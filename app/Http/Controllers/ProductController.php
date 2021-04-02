<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Carbon\Doctrine\CarbonType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('/welcome', ['products' => $products]);
    }

    public function productdetail($id)
    {
        $result = Product::where('id', $id)->first();;
        return view('/productdetail', ['product' => $result]);
    }
    public function search(Request $request)
    {
        $results = Product::where('name', 'like', '%' . $request->input('name') . '%')->get();
        return view('/searchresults', ['results' => $results]);
    }
    public function addtocart(Request $request)
    {
        if ($request->session()->has('user')) {
            $id = $request->session()->get('user')->id;
            $cart =  new Cart();
            $cart->user_id = $id;
            $cart->product_id = $request->product_id;

            $cart->save();

            return redirect('/products');
        } else {
            return redirect('login');
        }
    }
    public static function cartnotification()
    {
        if (Session::exists('user')) {
            $user_id = Session::get('user')['id'];
            $result = count(Cart::where('user_id', $user_id)->get());
            return  $result;
        } else {
            return "";
        }
    }

    public function mycart()
    {
        if (Session::exists('user')) {
            $user_id = Session::get('user')['id'];
            $products = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id','=', $user_id)
                ->select('products.*','cart.id as cart_id')
                ->get();

            return view('cartdetails', ['products' => $products]);
        } else {
            return view('cartdetails', ['message' => "Your cart is empty!"]);
        }
    }

    public function removefromcart($id){
        $item  = Cart::find($id);
        $item->delete();
        return back();
    }
}
