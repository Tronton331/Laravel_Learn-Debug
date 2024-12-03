<?php
namespace App\Http\Controllers;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register");
    }

    // Validasi input
    public function store(Request $request)
    {
        $newUser = $request->validate([
            'username' => 'required|max:255',
            'email'=> 'required|max:255|email:dns',
            'password'=> 'required|min:8|max:255',
            'firstname' => 'required|max:255',
            'lastname' => 'max:255',
        ]);

        // Buat User
        User::create($newUser);
        // Go to login
        return redirect('login')->with('success','Create user success');
    }
}
