<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;

class PagesController extends Controller
{
    public function index()
    {
        $pages  = Pages::orderBy('id','DESC')->paginate(5);
        return view('admin.pages.index',compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }
    public function store(StorePageRequest $request)
    {
        $request = $request->validated();
        $request['link'] = _slug($request['link']);
        Pages::create($request);
        return redirect('/dashboard/pages/')->with('success','Page Created Successfuly');
    }
    public function show($id)
    {
        Pages::where('link',$id)->first();
    }
    public function edit($id)
    {
        $page = Pages::find($id);
        return view('admin.pages.update',compact('page'));
    }
    public function update(UpdatePageRequest $request,$id)
    {
        $request = $request->validated();
        $page = Pages::find($id);
        $request['link'] = _slug($request['link']);
        $page->update($request);
        return redirect('/dashboard/pages/')->with('success','Page Updated Successfuly');
    }

    public function destroy($id)
    {
        $blog = Pages::find($id);
        $blog->delete();
        return redirect('/dashboard/pages/')->with('danger','Page Deleted Successfuly');
    }
}
