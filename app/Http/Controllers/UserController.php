<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\Blog;
class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(5);
        return view('admin.users.index',compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',['roles'=>$roles]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'repassword'=>'required',
            'role'=>'required'
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(10);
        $user->syncRoles($request->role);
        if( $request->input('repassword')!=$request->input('password'))
        {
            return redirect('/dashboard/users/create')->with('danger','Password don`t same');
        }
        else
        {
            $user->save();
            return redirect('/dashboard/users/create')->with('success','User Created');
        }
    }
    public function show()
    {
        return true;
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.update',compact('user'),['roles'=>$roles]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'repassword'=>'required',
            'role'=>'required'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->syncRoles($request->role);
        if( $request->input('repassword')!=$request->input('password'))
        {
            return redirect('/dashboard/users/edit/'.$user->id)->with('danger','Password don`t same');
        }
        else
        {
            $user->save();
            return redirect('/dashboard/users/')->with('success','User Updated');
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->id == 1)
        {
            return redirect()->back()->with('delete','Main User cannot be deleted');
        }
        Blog::where('publisher',$user->id)->delete();
        $user->delete();
        return redirect('/dashboard/users/')->with('delete','User Deleted');
    }
}
