<?php

namespace App\Http\Controllers;

use App\Models\SettingThemeLink;
use Illuminate\Http\Request;

class SettingThemeLinkController extends Controller
{
    public function index()
    {
        $headers = SettingThemeLink::where('type','header')->get();
        $footers = SettingThemeLink::where('type','footer')->get();
        return view('admin.settings.link',compact('headers','footers'));
    }
    public function headerCreate(Request $request)
    {
        $request->validate([
            'page'=>'required|max:50',
            'slug'=>'nullable',
        ]);
        $menu  = new SettingThemeLink();
        $menu->page = $request['page'];
        $menu->slug = _slug($request['slug']);
        $menu->type = 'header';
        $menu->save();
        return redirect()->route('setting.theme-index')->with('success','Created Successfuly');
    }
    public function footerCreate(Request $request)
    {
        $request->validate([
            'page'=>'required|max:50',
            'slug'=>'nullable',
        ]);
        $menu  = new SettingThemeLink();
        $menu->page = $request['page'];
        $menu->slug = _slug($request['slug']);
        $menu->type = 'footer';
        $menu->save();
        return redirect()->route('setting.theme-index')->with('success','Created Successfuly');
    }
    public function delete($id)
    {
        $menu = SettingThemeLink::find($id);
        $menu->delete();
        return redirect()->route('setting.theme-index')->with('success','Deleted Successfuly');
    }
}
