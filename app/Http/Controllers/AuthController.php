<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function register(){
    return view("auth.register");
   }

   public function registerUser(Request $request){
    $request->validate([
        "nom_complet"=>"required",
        "email"=>"required|email",
        "password"=>"required|min:8|confirmed",
    ]);

    $data=$request->all();
    $data["password"]=Hash::make($request->password);
    $user=User::create($data);

    // $user=User::create([
    //     "nom_complet"=>$request->nom_complet,
    //     "email"=>$request->email,
    //     "password"=>Hash::make($request->password)
    // ]);

    Auth::login($user);
  
    return redirect()->route("home");

   }

    public function login(){
          return view("auth.login");
   }

   public function loginUser(Request $request){
        if(Auth::attempt(["email"=>$request->email, "password"=>$request->password],true)){
            $request->session()->regenerate();
            return redirect()->intended(); 
        }

      return back()->withErrors([
            'email' => 'Données invalides!',
            ])->onlyInput('email');

   }

    public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');

   }
}
