<?php

//  where this file axis
namespace App\Http\Controllers;

//  import file Controller
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
        // $user = User::get();
        // return response()->json($user);
    }
}
