<?php

//  where this file axis
namespace App\Http\Controllers;
use Illuminate\Http\Request;

//  import file Controller
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
        // $user = User::get();
        // return response()->json($user);
    }

    public function auth(Request $request)
    {
        $login = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->intended('welcome');
        }

        return back()->with("nologin", "Idk what happend here");
    }
}
