@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">SMTP Settings</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
                @if (session('success'))
                    <div class="alert alert-success text-center col-md-10 mx-auto">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">SMTP Settings</h3>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form action="{{route('setting.smtp.update',$smtp->id)}}" method="post">
                                    @csrf
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Port</label>
                                            <div class="col-lg-10">
                                                <input value="{{$smtp->port ?? null}}" type="number" name="port" placeholder="Max: 10 character" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Host</label>
                                            <div class="col-lg-10">
                                                <input value="{{$smtp->host ?? null}}" type="text" name="host" class="form-control" placeholder="Max: 60 character">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Username</label>
                                            <div class="col-lg-10">
                                                <input value="{{$smtp->username ?? null}}" type="text" name="username" placeholder="Max: 120 character" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Password</label>
                                            <div class="col-lg-10">
                                                <input value="{{$smtp->password ?? null}}" type="password" name="passwrod" placeholder="Max: 120 character" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Encryption</label>
                                            <div class="col-lg-10">
                                                <input value="{{$smtp->encryption ?? null}}" type="text" class="form-control" name="encryption" placeholder="Max: 20 character">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Sender Name</label>
                                            <div class="col-lg-10">
                                                <input value="{{$smtp->sender_name ?? null}}" type="text" name="sender_name" class="form-control" placeholder="Max: 60 character">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Sender Email</label>
                                            <div class="col-lg-10">
                                                <input value="{{$smtp->sender_email ?? null}}" type="email" class="form-control" name="sender_email" placeholder="Max: 60 character">
                                            </div>
                                        </div>

                                    </fieldset>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



