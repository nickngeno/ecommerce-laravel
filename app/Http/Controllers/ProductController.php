<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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
            if (Cart::where('user_id', $user_id)->count() > 0) {
                $products = DB::table('cart')
                    ->join('products', 'cart.product_id', '=', 'products.id')
                    ->where('cart.user_id', '=', $user_id)
                    ->select('products.*', 'cart.id as cart_id')
                    ->get();
                $amounts = $this->cartcheckout();

                return view('cartdetails', ['products' => $products, 'amounts' => $amounts]);
            } else {
                return view('cartdetails', ['products' => '', 'message' => "Your cart is empty!"]);
            };
        } else {
            return view('cartdetails', ['message' => "Your cart is empty!"]);
        }
    }

    public function removefromcart($id)
    {
        $item  = Cart::find($id);
        $item->delete();
        return back();
    }

    public function cartcheckout()
    {
        if (Session::exists('user')) {
            $user_id = Session::get('user')['id'];
            $cost = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', '=', $user_id)
                ->sum('products.price');
            $vat = floatval(0.16 * $cost);
            $totalcost = $vat + $cost;

            $amounts = [$cost, $vat, $totalcost];
            return $amounts;
        } else {
            return redirect('/login');
        }
    }

    public function checkout()
    {
        $amount = $this->cartcheckout();
        return view('checkout', ['amounts' => $amount]);
    }

    public function orderNow(Request $request)
    {
        $user_id = Session::get('user')['id'];
        $mycart = Cart::where('user_id', $user_id)->get();
        foreach ($mycart as $cart) {
            $order = new Order();
            $order->user_id = $user_id;
            $order->product_id = $cart->product_id;
            $order->address = $request->address;
            $order->status = "pending";
            $order->payment_status = "paid";
            $order->transactionID = $request->transactionID;
            $order->save();

            Cart::where('user_id', $user_id)->delete();

        }

        return redirect('/');
    }

    public function myOrders (){
        if (Session::exists('user')) {
            $user_id = Session::get('user')['id']; 
            if(Order::where('user_id', $user_id)->count() > 0){
                $myorders = DB::table('products')
                        ->join('orders', 'orders.product_id', '=', 'products.id')
                        ->where('orders.user_id', '=', $user_id)
                        ->get();

                    return view('myorders', ['myorders' => $myorders]);
            }else{
                return view('myorders', ['myorders' => "", 'message' => "You dont have any order yet!"]);
            }
        }else
         {
            return view('myorders', ['message' => "You dont have any order yet!"]);
       }
    }
}
