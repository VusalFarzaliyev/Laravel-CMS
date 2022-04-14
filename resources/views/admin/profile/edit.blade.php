@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="breadcrumb">
            <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
            <span class="breadcrumb-item active">Profile / Edit</span>
        </div>
        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-header">
                        <h6 class="card-title">Profile edit</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{"/dashboard/profile/update/".auth()->user()->id}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Name</label>
                                        <input type="text" value="{{auth()->user()->name}}" class="form-control" name="name">
                                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Surname</label>
                                        <input type="text" value="{{auth()->user()->surname}}" class="form-control" name="surname">
                                        @error('surname')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <input type="email" value="{{auth()->user()->email}}" class="form-control" name="email">
                                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Username</label>
                                        <input type="text" value="{{auth()->user()->username}}" class="form-control" name="username">
                                        @error('username')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Password</label>
                                        <input type="password"  class="form-control" name="password" >
                                        @error('password')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Re-Password</label>
                                        <input type="password" class="form-control" name="repassword">
                                        @error('repassword')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            @if (session('danger'))
                                <div class="text-danger text-center ">
                                    {{ session('danger') }}
                                </div>
                            @endif
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
