<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('name','ASC')->paginate(5);
        return view('admin.tags.index',compact('tags'));
    }
    public function create()
    {
        return view('admin.tags.create');
    }
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required|min:3|max:50|unique:tags',
           'desc'=>'nullable'
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->desc  = $request->desc;
        $tag->save();
        return redirect()->route('tag.index')->with('success','Tag Created');
    }
    public function show()
    {
        $tag = Tag::all();
        return response()->json($tag);
    }
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.update',compact('tag'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|min:3|max:50|unique:tags,name,'.$id,
            'desc'=>'nullable'
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->desc  = $request->desc;
        $tag->save();
        return redirect()->route('tag.index')->with('success','Tag Updated');
    }
    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tag.index')->with('danger','Tag Deleted');
    }
}
