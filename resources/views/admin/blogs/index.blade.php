@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">Blogs</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success text-center col-md-10 mx-auto">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('danger'))
                            <div class="alert alert-danger text-center col-md-10 mx-auto">
                                {{ session('danger') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="float-left">
                            <a href="{{'/dashboard/blogs/add'}}" class="btn btn-warning ml-3"><i class="icon-add"></i> Add New Post</a>
                        </div>
                        <div class="float-right mr-5">
                            <span >{{$blogs->links()}}</span>
                        </div>
                        <div class="table-responsive pt-3">
                            @if(count($blogs) > 0)
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                    <tr>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Featured image
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Publisher
                                        </th>
                                        <th class="text-center">
                                            Operations
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{$blog->title}}</td>
                                            <td>
                                                <img src="{{asset('storage/'.$blog->image)}}" style="width: 200px; height: 100px;" class="rounded-3">
                                            </td>
                                            <td>{{$blog->category->name}}</td>
                                            <td>
                                                @if($blog->status == 1)
                                                    Active
                                                @elseif($blog->status == 0)
                                                    Deactive
                                                @endif
                                            </td>
                                            <td>
                                                {{$blog->user->username}}
                                            </td>
                                            <td class="text-center">
                                                <div class="list-icons">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{route('blog.tag_add',$blog->id)}}" class="dropdown-item text-success"><i style="font-size: 25px" class="icon-plus2"></i>Add Tags</a>
                                                            <a href="{{'/dashboard/blogs/edit/'.$blog->id}}" class="dropdown-item text-primary"><i style="font-size: 25px" class="icon-pencil7"></i>Edit Post</a>
                                                            <a href="{{'/dashboard/blogs/delete/'.$blog->id}}" class="dropdown-item text-danger" onclick="return confirm('Are you sure want to delete this blog?')"><i style="font-size: 25px" class="icon-trash"></i>Delete Post</a>
                                                            <a href="{{'/dashboard/blogs/galery/'.$blog->id}}" class="dropdown-item text-info"><i style="font-size: 25px" class="icon-image3"></i>Post Galery</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <tr>
                                    <div class="alert alert-warning text-center col-md-8 mx-auto">
                                        Empty
                                    </div>
                                </tr>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



