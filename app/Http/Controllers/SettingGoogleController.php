<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\GoogleRequest;
use App\Models\SettingGoogle;
use Illuminate\Http\Request;

class SettingGoogleController extends Controller
{
    public function index()
    {
        $google = SettingGoogle::find(1);
        return view('admin.settings.google',compact('google'));
    }
    public function update(GoogleRequest $request,$id)
    {
        $social = SettingGoogle::find($id);
        $social->update($request->validated());
        return redirect()->route('setting.google.index')->with('success','Changed Save Successfuly');
    }
}
