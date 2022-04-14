<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $all_category = Category::orderBy('id','DESC')->paginate(5);
        return view('admin.categories.index', compact('all_category'));
    }

    public function create()
    {
        $categories = Category::where('parent_id',0)->get();
        return view('admin.categories.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $all_category = new Category();
        $all_category->name = $request->input('name');
        $all_category->parent_id = $request->input('parent_id');
        $all_category->save();
        return redirect('/dashboard/categories/')->with('success', 'Category created successfuly!');
    }
    public function show($id)
    {
        return true;
    }
    public function edit($id)
    {
        $categories = Category::where('parent_id',0)->get();
        $category = Category::find($id);
        return view('admin.categories.update',compact('categories'),compact('category'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return redirect('/dashboard/categories/')->with('success', 'Category Updated Successfuly!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category)
        {
            $category->blogs()->delete();
            $category->delete();
        }
        return redirect('/dashboard/categories')->with('danger', 'Category Deleted with its Posts Successfuly!');
    }
}
