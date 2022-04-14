<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\SMTPRequest;
use App\Models\SMTP;
use Illuminate\Http\Request;

class SMTPController extends Controller
{
    public function index()
    {
        $smtp = SMTP::find(1);
        return view('admin.settings.smtp',compact('smtp'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(SMTP $sMTP)
    {
        //
    }

    public function edit(SMTP $sMTP)
    {
        //
    }

    public function update(SMTPRequest $request,$id)
    {
        $smtp = SMTP::find($id);
        $smtp->update($request->validated());
        return redirect()->route('setting.smtp.index')->with('success','SMTP Settings Updated');
    }

    public function destroy(SMTP $sMTP)
    {
        //
    }
}
