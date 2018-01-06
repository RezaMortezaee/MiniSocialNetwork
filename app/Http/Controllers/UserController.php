<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:users',
            'first_name'=>'required|max:120',
            'password'=>'required|min:6|max:40'
        ]);

        $first_name = $request['first_name'];
        $email =      $request['email'];
        $password =   bcrypt($request['password']);
        
        $user = new User();
        $user->first_name = $first_name;
        $user->email = $email;
        $user->password = $password;

        $user->save();
        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)
    {
        $this->validate($request,['email'=>'required','password'=>'required']);
        
        if (Auth::attempt([
            'email'=>$request['email'],
            'password'=>$request['password']
        ])) {
            return redirect()->route('dashboard');
        }else {
            return redirect()->back();
        }
    }

    public function getAccount()
    {
        return view('account',['user'=>Auth::user()]);
    }
}
