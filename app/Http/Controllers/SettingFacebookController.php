<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\FacebookRequest;
use App\Models\SettingFacebook;
use Illuminate\Http\Request;

class SettingFacebookController extends Controller
{
    public function index()
    {
        $facebook = SettingFacebook::find(1);
        return view('admin.settings.facebook',compact('facebook'));
    }
    public function update(FacebookRequest $request,$id)
    {
        $social = SettingFacebook::find($id);
        $social->update($request->validated());
        return redirect()->route('setting.facebook.index')->with('success','Changed Save Successfuly');
    }
}
