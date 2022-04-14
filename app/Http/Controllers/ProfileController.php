<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Auth::user();
        return view('admin.profile.index',compact('profile'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'surname'=>'required|min:3',
            'email'=>'required|email',
            'username'=>'required',
            'password'=>'required|min:3',
            'repassword'=>'required|min:3'
        ]);
        $profile = Auth::user();
        $profile->name     = $request->name;
        $profile->surname  = $request->surname;
        $profile->username = $request->username;
        $profile->email    = $request->email;
        $profile->password = Hash::make($request->password);
        if($request->password == $request->repassword)
        {
            $profile->update();
            return redirect('/dashboard/profile/')->with('success', 'Profile data updated successfuly');
        }
        return redirect('/dashboard/profile/')->with('danger', 'Passwords don`t same');
    }
}
