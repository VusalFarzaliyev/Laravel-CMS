@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/permissions"}}" class="breadcrumb-item"> Permissions</a>
                <span class="breadcrumb-item active">Create</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <form class="forms-sample" action="{{route('permission.update',$permission->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2 ml-3 mt-4">
                                <label for="exampleInputName1"> <b> Permission Name <span class="text-danger"> * </span></b></label>
                            </div>
                            <div class="col-xl-4 ml-1 mt-3">
                                <div class="form-group">
                                    <input value="{{$permission->name}}" type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-4 mt-3">
                                <div class="">
                                    <button class="btn btn-success">Update Permission</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

