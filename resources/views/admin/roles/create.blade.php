@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/roles"}}" class="breadcrumb-item"> Roles</a>
                <span class="breadcrumb-item active">Create</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form class="forms-sample" action="{{route('role.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-1 ml-3 mt-4">
                            <label for="exampleInputName1"> <b> Role Name <span class="text-danger"> * </span></b></label>
                            </div>
                            <div class="col-xl-4 ml-1 mt-3">
                                <div class="form-group">
                                    <input value="{{old('name')}}" type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-4 mt-3">
                                <div class="">
                                    <button class="btn btn-warning">Create Role</button>
                                </div>
                            </div>
                            <div class="col-xl-12 ml-3">
                                <div class="form-group">
                                    <h4 class=""><strong>Permissions</strong></h4>
                                </div>
                                   <div class="form-group">
                                       <label class="custom-control custom-control-info custom-checkbox mb-2">
                                           <input type="checkbox" class="custom-control-input checkbox" id="selectAll" >
                                           <span class="custom-control-label text-danger"><b>Select All</b></span>
                                       </label>
                                   </div>
                                @foreach($permissions as $permission)
                                <div class="form-group">
                                    <label class="custom-control custom-control-info custom-checkbox mb-2">
                                        <input value="{{$permission->id}}" type="checkbox" class="custom-control-input checkbox" name="permission[]" >
                                            <span class="custom-control-label ">{{$permission->name}}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <script>
            $("#selectAll").click(function(){
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
            });
        </script>
    </div>
@endsection

