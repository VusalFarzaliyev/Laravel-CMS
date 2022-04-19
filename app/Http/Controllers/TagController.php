<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id','ASC')->get()->groupBy('name');
        return view('admin.tags.index',compact('tags'));
    }
    public function show($name)
    {
        $tags = Tag::with(['post'=>function($query){
            $query->with(['category','user']);
        }])->where('name',$name)->get();
        return view('admin.blogs.blog_bytags',compact('tags'));
    }
}
