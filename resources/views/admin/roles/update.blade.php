@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/roles"}}" class="breadcrumb-item"> Roles</a>
                <span class="breadcrumb-item active">Edit / {{$role->id}}</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <!-- /page header -->
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
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <form class="forms-sample" action="{{route('role.update',$role->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-1 ml-3 mt-4">
                            <label for="exampleInputName1"> <b> Role Name <span class="text-danger"> * </span></b></label>
                            </div>
                            <div class="col-xl-4 ml-1 mt-3">
                                <div class="form-group">
                                    <input value="{{$role->name}}" type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-4 mt-3">
                                <div class="">
                                    <button class="btn btn-success">Update Role</button>
                                </div>
                            </div>
                            <div class="col-xl-6 ml-3">
                                <div class="form-group">
                                    <h4 class=""><strong>Permissions</strong></h4>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-control-info custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input checkbox" id="selectAll" >
                                        <span class="custom-control-label text-danger"><b>Select All</b></span>
                                    </label>
                                </div>
                                @foreach($permission as $per)
                                <div class="form-group">
                                    <label class="custom-control custom-control-info custom-checkbox mb-2">
                                        <input value="{{$per->id}}" type="checkbox" class="custom-control-input checkbox" name="permission[]" {{ $role->hasPermissionTo($per->id) ? 'checked' : null }}>
                                            <span class="custom-control-label">{{$per->name}}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
                <script>
                    $("#selectAll").click(function(){
                        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                    });
                </script>
            </div>
        </div>
    </div>
@endsection

