@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/blogs"}}" class="breadcrumb-item"> Blogs</a>
                <span class="breadcrumb-item active">Image Edit</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="card col-lg-6 mx-auto">
                <div class="card-header bg-white header-elements-inline">
                    <h6 >Image Edit</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('blog.imageUpdate',$image->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="file" name="image" class="form-control">
                        @error('image')<span class="text-danger">{{$message}}</span>@enderror
                        <img class="img-fluid mt-4" src="{{"/storage/".$image->name}}" style="max-width: 600px;max-height: 400px;">
                        <button class="btn btn-success btn-block mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
