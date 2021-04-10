<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return 'username or password is not correct';
        } else {
            $request->session()->put('user', $user);
            return redirect('/products');
        }
    }

    public function register(Request $request)
    {
        $this -> validate($request, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
            'gender' => 'required'
        ]);

        $user = new User();
        $user->firstname = $request->fname;
        $user->lastname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;

        $user->save();
        // $request->session()->flash('register_status', 'User has been registered successfully');
        return redirect('/login')->with('success', 'Post created successfully.');
    }
    public function logout()
    {
        if (Session::has('user')) {
            Session::remove('user');

            return redirect('/products');
        }
    }
}
