<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\LanguageRequest;
use App\Http\Requests\Settings\LanguageUpdateRequest;
use App\Models\Setting;
use App\Models\SettingLanguage;
use Illuminate\Http\Request;

class SettingLanguageController extends Controller
{
    public function index()
    {
        $languages = SettingLanguage::orderBy('name','ASC')->paginate(5);
        return view('admin.settings.language',compact('languages'),['layout'=>'index']);
    }
    public function create(LanguageRequest $request)
    {
        $language = new SettingLanguage();
        $language->create($request->validated());
        return redirect()->route('setting.language.index')->with('success','New Language Created');
    }
    public function edit($id)
    {
        $language  = SettingLanguage::find($id);
        $languages = SettingLanguage::orderBy('name','ASC')->paginate(5);
        return view('admin.settings.language',compact('language','languages'),['layout'=>'edit']);
    }
    public function update(LanguageUpdateRequest $request,$id)
    {
        $language  = SettingLanguage::find($id);
        $language->update($request->validated());
        return redirect()->route('setting.language.index')->with('success','Language Updated Successfuly');
    }
}
