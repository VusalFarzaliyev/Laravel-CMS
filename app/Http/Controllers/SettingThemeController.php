<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingThemeController extends Controller
{
    public function index()
    {
        return view('admin.settings.haeder');
    }
}
