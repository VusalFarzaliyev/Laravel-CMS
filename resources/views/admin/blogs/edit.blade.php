@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/blogs"}}" class="breadcrumb-item"> Blogs</a>
                <span class="breadcrumb-item active">Edit / {{$blog->id}}</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            @if (session('danger'))
                <div class="alert alert-danger text-center col-md-6 mx-auto">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-validate-jquery" method="post" action="{{route('blog.update',$blog->id)}}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Edit Blog</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Title <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input value="{{$blog->title}}"  type="text" class="form-control" placeholder="Enter Title" name="title">
                                        @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Sub-Description </label>
                                    <div class="col-lg-10">
                                        <input value="{{$blog->subdesc}}"  type="text" class="form-control" placeholder="Enter Sub-Description" name="subdesc">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Status <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            @if($blog->status ==1)
                                                <option value="1" selected>Active</option>
                                                <option value="0">Deactive</option>
                                            @elseif($blog->status ==0)
                                                <option value="1" >Active</option>
                                                <option value="0" selected>Deactive</option>
                                            @endif
                                        </select>
                                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Category <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="exampleSelectGender" name="category_id">
                                            <option class="form-control" value="">Select Category</option>
                                            @foreach($categories as $category)
                                                @if($category->id == $blog->category_id)
                                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Description <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <textarea id="summary-ckeditor" name="content" cols="30" rows="5" class="form-control">{{$blog->content}}</textarea>
                                        @error('content')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Featured Image <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="file" name="image" class="custom-file-input" style="height: 44px !important;" >
                                        <span class="custom-file-label">Choose File</span>
                                        @error('image')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Seo Fields</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Meta Title </label>
                                    <div class="col-lg-10">
                                        <input value="{{$blog->seo_title}}"  type="text" class="form-control"  name="seo_title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Meta Keyword</label>
                                    <div class="col-lg-10">
                                        <input value="{{$blog->seo_keyword}}"  type="text" class="form-control"  name="seo_keyword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Meta Keyword </label>
                                    <div class="col-lg-10">
                                        <textarea name="seo_description" cols="30" rows="5" class="form-control">{{$blog->seo_description}}</textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{url('/dashboard/blogs/update/'.$blog->id)}}" type="reset" class="btn btn-light" >Reset <i class="icon-reload-alt ml-2"></i></a>
                                <button type="submit" class="btn btn-success ml-3">Update <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
