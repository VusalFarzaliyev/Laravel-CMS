@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">Settings / Google</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-11 mx-auto">
                @if (session('success'))
                    <div class="alert alert-success text-center col-md-10 mx-auto">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Google Login Credential</h3>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form method="post" class="form-validate-jquery" action="{{route('setting.google.update',$google->id)}}" >
                                    @csrf
                                    <input type="hidden" name="login" value="{{true}}">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Client ID
                                        </div>
                                        <div class="col-md-9">
                                            <input value="{{$google->client_id ?? null}}" type="number" name="client_id" class="form-control" placeholder="Google Client ID">
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            Client Secret
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <input value="{{$google->client_secret ?? null}}" type="text" name="client_secret" class="form-control" placeholder="Google Client Secret">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <input type="submit" class="btn btn-warning float-right" value="Update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Google Analytics Setting</h3>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form method="post" class="form-validate-jquery" action="{{route('setting.google.update',$google->id)}}" >
                                    @csrf
                                    <input type="hidden" name="analytic" value="{{true}}">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                           Google Analytics
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-control custom-control-right custom-switch text-left mb-2">
                                                <input type="checkbox" class="custom-control-input" id="sc_rs_c" @if($google->analytics == true ) checked @endif name="analytics">
                                                <label class="custom-control-label" for="sc_rs_c"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            Tracking ID
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <input value="{{$google->tracking_id ?? null}}" type="text" name="tracking_id" class="form-control" placeholder="Tracking ID">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <input type="submit" class="btn btn-warning float-right" value="Update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Google Firebase Setting</h3>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form method="post" class="form-validate-jquery" action="{{route('setting.google.update',$google->id)}}" >
                                    @csrf
                                    <input type="hidden" name="fire" value="{{true}}">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Google Firebase
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-control custom-control-right custom-switch text-left mb-2">
                                                <input type="checkbox" class="custom-control-input" id="sc_rss_c" @if($google->firebase == true ) checked @endif name="firebase">
                                                <label class="custom-control-label" for="sc_rss_c"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                           FCM SERVER KEY
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <input value="{{$google->firebase_key ?? null}}" type="text" name="firebase_key" class="form-control" placeholder="Firebase Server Key">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <input type="submit" class="btn btn-warning float-right" value="Update">
                                        </div>
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



