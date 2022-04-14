<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::all();
       return view('admin.settings.general',compact('setting'));
    }
    public function update(Request $request)
    {
        $request->validate([
           'setting[logo]'=>'file|image',
            'setting[img]'=>'file|image',
        ]);
        $request  = $request->all();
        if(isset($request['setting']['logo'])){
            if(file_exists('storage/'._settings('logo')))
            {
                File::delete('/storage/'._settings('logo'));
            }
            $request['setting']['logo'] = _setFileName($request['setting']['logo'],'settings')->getData()->name;

        }
        if(isset($request['setting']['img'])){
            if(file_exists('storage/'._settings('img')))
            {
                File::delete('/storage/'._settings('img'));
            }
            $request['setting']['img'] = _setFileName($request['setting']['img'],'settings')->getData()->name;

        }
        if(isset($request['setting']['favicon'])){
            if(file_exists('storage/'._settings('favicon')))
            {
                File::delete('storage/'._settings('favicon'));
            }
            $request['setting']['favicon'] = _setFileName($request['setting']['favicon'],'settings')->getData()->name;
        }
        foreach ($request['setting'] as $key=>$value)
        {
            Setting::updateOrCreate(
                ['key'=>$key],
                ['value' => $value]
            );
        }
        return redirect()->route('setting.index')->with('success','Updated');
    }
}
