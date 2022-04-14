@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/users"}}" class="breadcrumb-item"> Users</a>
                <span class="breadcrumb-item active">Edit / {{$user->id}}</span>
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
            <div class="col-xl-12">
                <div class="card">
                    <form class="forms-sample" action="{{'/dashboard/users/update/'.$user->id}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 mt-1">
                                <div class="form-group">
                                    <input value="{{$user->name}}" type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-6 mt-1">
                                <div class="form-group">
                                    <input value="{{$user->surname}}" type="text" class="form-control" id="exampleInputName1" placeholder="Surname" name="surname">
                                    @error('surname')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <input value="{{$user->username}}" type="text" class="form-control" id="exampleInputName1" placeholder="Username" name="username">
                                    @error('username')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <input value="{{$user->email}}" type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email">
                                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-password" name="repassword">
                                    @error('repassword')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Choose Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}" {{$user->hasRole($role->name) ? "selected" : ""}}>
                                                {{$role->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <button class="btn btn-success">Update</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

