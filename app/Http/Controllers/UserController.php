<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login (Request $request) 
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password,$user ->password)) 
        {
            return 'username or password is not correct';
        }
        else{
            $request->session()->put('user',$user);
            return redirect('/products');
        }
    }

    public function logout()
    {
        if(Session::has('user'))
        {
            Session::remove('user');
            
            return redirect('/products');
        }
    }
}
