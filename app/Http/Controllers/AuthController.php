<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.index');
    }
    public function Authcheck(Request $request)
    {
        $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);
        if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect()->back()->with('danger','Email or Password wrong');
        }
        return redirect('/dashboard');
    }
    public function logout()
    {
        auth()->logout();
        return redirect("/admin");
    }
}

