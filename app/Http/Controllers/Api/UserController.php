<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, Log};
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return response()->json(["Status"=>"Success", "users"=>$users], 200);
    }

    public function store(Request $request)
    {
        //  Validate user input and put to $validator
        $validator = Validator::make($request->all(), [
            "username"=>"required|max:255",
            "email"=>"required|max:255|email|unique:users,email,id",
            "password"=>"required|max:255|min:8",
            "firstname"=>"required|max:255",
            "lastname"=>"nullable"
        ]);
        //  If user input not accept rule
        if ($validator->fails())
        {
            return response()->json(["message"=>"Invalid field", "error"=>$validator->errors()], 422);
        }
        //  Create new user in database
        $input = $request->all();
        $user = User::create($input);
        //  Give response
        return response()->json(["message"=> "Success create user","users"=>$user],200);
    }

    public function update(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "username"=>"nullable|max:255",
            "email"=>"nullable|max:255|email|unique:users,email,id",
            "password"=>"nullable|max:255|min:8",
            "firstname"=>"nullable|max:255",
            "lastname"=>"nullable|max:255"
        ]);
        if ($validator->fails())
        {
            return response()->json(["message"=>"Invalid field", "error"=>$validator->errors()], 422);
        }
        // Remove value password if user give input without value
        $input = $request->all();
        if (empty($input['username']) && empty($input['email']) && empty($input['password']) && empty($input['firstname']) && empty($input['lastname']))
        {
            return response()->json(['message'=> 'Not edit user cause no user input'], 400);
        }
        if (empty($input['username']))
        {
            unset($input['username']);
        }
        if (empty($input['email']))
        {
            unset($input['email']);
        }
        if (empty($input['password']))
        {
            unset($input['password']);
            Log::debug("input['password'] dihilangkan");
        }
        if (empty($input['firstname']))
        {
            unset($input['firstname']);
        }
        if (empty($input['lastname']))
        {
            unset($input['lastname']);
        }
        // Edit user
        $user->update($input);
        // Give response
        return response()->json(["message"=> "User update success", "users"=>$user],200);
    }

    public function destroy(User $user, Request $request)
    {
        $user->delete();
        return response()->json(["message"=>"User delete success"], 200);
    }
}
