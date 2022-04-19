<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\StoreTagRequest;
use App\Models\BlogImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\New_;
use function PHPUnit\Framework\isNull;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('blogImage')
                    ->orderBy('id','DESC')
                    ->paginate(5);
        return view('admin.blogs.index',compact('blogs'));
    }
    public function add()
    {
        $categories = Category::all();
        return view('admin.blogs.add',compact('categories'));
    }
    public function create(StoreBlogRequest $request)
    {
//        dd($request->toArray());
        $request = $request->validated();
        if($request['image'])
        {
            $img = $request['image'];
            $fileExtension = $img->getClientOriginalExtension();
            $fileName= substr(md5(time().uniqid()),0,15).'.'.$fileExtension;
            $img->storeAs('public/blogs/',$fileName);
            $request['image'] = 'blogs/'.$fileName;
        }
        $blog    = Blog::create($request);
        if(isset($request['tags']))
        {
         // $blog->tags()->delete();
          $tags =  explode(',',$request['tags']);
          foreach ($tags as $tag)
          {
              $blog->tags()->create(['name'=>_slug($tag)]);
          }
        }
        if(isset($request['images']))
        {
            foreach ($request['images'] as $file)
            {
                $fileExtension = $file->getClientOriginalExtension();
                $fileName= 'blogImages/'.substr(md5(time().uniqid()),0,15).'.'.$fileExtension;
                $file->storeAs('public/',$fileName);
                $blog->blogImage()->create(['name'=>$fileName]);
            }
        }
        return redirect('/dashboard/blogs/')->with('success','Blog Created Successfuly');
    }
    public function edit($id)
    {
        $blog       = Blog::with('tags')->find($id);
        $categories = Category::all();
        $users      = User::all();
        return view('admin.blogs.edit',compact('blog'),compact('users'))->with(['categories'=>$categories]);
    }
    public function update(Request $request, $id)
    {
        $blog = Blog::with('tags')->find($id);
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'status'=>'required',
            'content'=>'required',
            'image'=>'file|image',
            'tags'=>'nullable'
        ]);
        if(!isNull($request['tags']))
        {
            $blog->tags()->delete();
            foreach ($request['tags'] as $tag)
            {
                $blog->tags()->create(['name'=>$tag]);
            }
        }
        $blog->title             = $request->input('title');
        $blog->seo_title        = $request->input('seo_title');
        $blog->seo_keyword      = $request->input('seo_keyword');
        $blog->seo_description  = $request->input('seo_description');
        $blog->subdesc           = $request->input('subdesc');
        $blog->category_id       = $request->input('category_id');
        $blog->status            = $request->input('status');
        $blog->publisher         = auth()->user()->id;
        $blog->content           = $request->input('content');
        if($request->hasFile('image'))
        {
            $path = 'storage/'.$blog->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $blog->image = _setFileName($file,'blogs')->getData()->name;
        }
        $blog->save();
        return redirect('/dashboard/blogs/')->with('success','Blog Updated Successfuly');
    }
    public function delete($id)
    {
        $blog = Blog::find($id);
        $path = 'storage/'.$blog->images;
        if(File::exists($path))
        {
            File::delete($path);
        }
        Tag::where('blog_id',$blog->id)->delete();
        $blog->delete();
        return redirect('/dashboard/blogs/')->with('danger','Blog Deleted Successfuly');
    }
    public function galery($id)
    {
        $galeries = BlogImage::where('blog_id',$id)->paginate(5);
        return view('admin.blogs.galery',compact('galeries'));
    }
    public function imageDelete($id){
        $galery = BlogImage::find($id);
        $path = 'storage/'.$galery->name;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $galery->delete();
        return redirect()->back()->with('danger','Image Deleted Successfuly');
    }
    public function imageEdit($id)
    {
        $image =BlogImage::find($id);
        return view('admin.blogs.galery_imageEdit',compact('image'));
    }
    public function imageUpdate(Request $request,$id)
    {
        $request->validate([
            'image'=>'file|image'
        ]);
        $image = BlogImage::find($id);
        if($request->hasFile('image'))
        {
            $path = 'storage/'.$image->name;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $image->name = _setFileName($file,'blogImages')->getData()->name;
        }
        $image->save();
        return redirect('/dashboard/blogs/galery/'.$image->blog_id)->with('success','Image Updated Successfuly');
    }
    public function checkDelete(Request $request)
    {
        $checkbox=$request->id;
        if($checkbox)
        {
            $checkbox = explode(',',$checkbox);
            for($i=0;$i<count($checkbox);$i++)
            {
                $galery = BlogImage::where('id',$checkbox[$i])->first();
                $path = 'storage/'.$galery->name;
                if(File::exists($path))
                {
                    File::delete($path);
                }
                $galery->delete();
            }
        }
        return redirect('/dashboard/blogs/galery/'.$galery->blog_id)->with(['success'=>"Checked Delete"]);
    }

}
