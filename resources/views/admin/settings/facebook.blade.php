@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">Settings / Facebook</span>
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
                                <h3 class="card-title">Facebook Login Credential</h3>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form method="post" class="form-validate-jquery" action="{{route('setting.facebook.update',$facebook->id)}}" >
                                    @csrf
                                    <input type="hidden" name="login" value="{{true}}">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Client ID
                                        </div>
                                        <div class="col-md-9">
                                            <input value="{{$facebook->client_id ?? null}}" type="number" name="client_id" class="form-control" placeholder="Facebook Client ID">
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            Client Secret
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <input value="{{$facebook->client_secret ?? null}}" type="text" name="client_secret" class="form-control" placeholder="Facebook Client Secret">
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
                                <h3 class="card-title">Facebook Chat Setting</h3>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form method="post" class="form-validate-jquery" action="{{route('setting.facebook.update',$facebook->id)}}" >
                                    @csrf
                                    <input type="hidden" name="chat" value="{{true}}">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Facebook Chat
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-control custom-control-right custom-switch text-left mb-2">
                                                <input type="checkbox" class="custom-control-input" id="sc_rs_c" @if($facebook->chat_status == true ) checked @endif name="chat_status">
                                                <label class="custom-control-label" for="sc_rs_c"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                           Facebook Page ID
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <input value="{{$facebook->chat_id ?? null}}" type="number" name="chat_id" class="form-control" placeholder="Facebook Chat ID">
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
                                <h3 class="card-title">Facebook Pixel Setting</h3>
                                <hr>
                            </div>
                            <div class="card-body">
                                <form method="post" class="form-validate-jquery" action="{{route('setting.facebook.update',$facebook->id)}}" >
                                    @csrf
                                    <input type="hidden" name="pixel" value="{{true}}">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Facebook Pixel
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-control custom-control-right custom-switch text-left mb-2">
                                                <input type="checkbox" class="custom-control-input" id="sc_rss_c" @if($facebook->pixel_status == true ) checked @endif name="pixel_status">
                                                <label class="custom-control-label" for="sc_rss_c"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            Facebook Pixel ID
                                        </div>
                                        <div class="col-md-9 mt-2">
                                            <input value="{{$facebook->pixel_id ?? null}}" type="number" name="pixel_id" class="form-control" placeholder="Facebook Pixel ID">
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



