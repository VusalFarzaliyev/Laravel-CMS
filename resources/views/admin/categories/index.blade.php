@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">Categories</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="card">
                    <div class="float-left mt-3">
                        <a href="{{'/dashboard/categories/create'}}" class="btn btn-warning ml-3"><i class="icon-add"></i> Add New</a>
                    </div>
                    <div class="card-body">
                        @if (session('danger'))
                            <div class="alert alert-danger text-center">
                                {{ session('danger') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(count($all_category) >0 )
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-center">
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Parent Category</th>
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach($all_category as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>

                                                @if($category->parent)
                                                    <td>{{$category->parent->name}}</td>
                                                @else
                                                    <th class="text-danger">{{ "Main Category" }}</th>
                                                @endif
                                            <td>
                                                <a class="btn btn-inverse-primary btn-rounded btn-icon " href="{{url('/dashboard/categories/edit/'.$category->id)}}"><i style="font-size: 25px" class="icon-pencil7  text-primary"></i></a>
                                                <a class="ml-1 btn btn-inverse-danger btn-rounded btn-icon" href="{{url('/dashboard/categories/delete/'.$category->id)}}" onclick="return confirm('Are you sure want to delete this category?')"><i style="font-size: 25px" class="icon-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right mr-2 mt-3">
                                    <span >{{$all_category->links()}}</span>
                                </div>
                            </div>
                        @else
                            <tr>
                                <div class="alert alert-warning text-center col-md-12">
                                    Empty
                                </div>
                            </tr>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

