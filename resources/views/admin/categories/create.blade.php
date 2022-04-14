@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/categories"}}" class="breadcrumb-item"> Categories</a>
                <span class="breadcrumb-item active">Create</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Category Name" class="form-control">
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <select name="parent_id" class="form-control">
                                    <option value="0">Choose Parent Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

