@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{route('tag.index')}}" class="breadcrumb-item">Tags</a>
                <span class="breadcrumb-item active">Update</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <form class="forms-sample" action="{{route('tag.update',$tag->id)}}" method="post">
                        @csrf
                        @method('Put')
                        <div class="row">
                            <div class="col-xl-10 mx-auto mt-1">
                                <div class="form-group">
                                    <label for="exampleInputName1">Name <span class="text-danger">*</span></label>
                                    <input value="{{$tag->name}}" type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-10 mx-auto mt-1">
                                <div class="form-group">
                                    <label for="exampleInputDesc">Description</label>
                                    <textarea class="form-control" name="desc" id="exampleInputDesc">{{$tag->desc}}</textarea>
                                </div>
                            </div>
                            <div class="col-xl-10 mx-auto mt-1 mb-3">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

