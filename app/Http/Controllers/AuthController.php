<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login():View{
        return view('auth.login');
    }
    public function logout():View{
        Auth::logout();
        return view('auth.login');
    }
    public function execlogin(loginRequest $request){
      $data=$request->validated();
      if(Auth::attempt($data)){
         $request->session()->regenerate();
         return redirect()->intended('/dashboard');
      }
    return to_route('auth.login')->withErrors([
        'email'=>'email invalide',
        'password'=>'password invalide'
    ])->onlyInput('email');
    }
}
