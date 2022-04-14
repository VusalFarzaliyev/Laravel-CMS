<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('id','DESC')->paginate(7);
        return view('admin.permissions.index',compact('permissions'));
    }
    public function create()
    {
        return view('admin.permissions.create');
    }
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();
        return redirect(route('permission.index'))->with('success','Permission Created');
    }
    public function edit($id)
    {
       $permission = Permission::find($id);
       return view('admin.permissions.update',compact('permission'));
    }
    public function update(Request $request,$id)
    {
        $request->validate(['name'=>'required']);
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();
        return redirect(route('permission.index'))->with('success','Permission Updated');
    }
    public function destroy($id)
    {
        $role = Permission::find($id);
        $role->delete();
        return redirect(route('permission.index'))->with('delete','Permission Deleted');
    }
}
