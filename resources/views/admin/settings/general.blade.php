@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="breadcrumb">
            <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
            <span class="breadcrumb-item active">Settings</span>
        </div>
        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                    <div class="card">
                        <div class="card-header"><h2>General Settings</h2><hr></div>
                        <div class="card-body col-xl-11 mb-5 mx-auto bg-light">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                            <form class="forms-sample" action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input value="{{_settings('title')}}" type="text" class="form-control" id="exampleInputName1" placeholder="Title"  name="setting[title]" >
                                        </div>
                                    </div>
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label>Description</label>
                                           <textarea name="setting[description]" cols="30" rows="10" class="form-control">{{_settings('description')}}</textarea>
                                       </div>
                                   </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Favicon</label>
                                            <input type="file"  name="setting[favicon]" accept="image/*" class="form-control" style="height: 44px !important;">
                                            @error('favicon')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        @if(_settings('favicon'))
                                        <img class="ml-3 mb-2 rounded" src="{{url('storage/'._settings('favicon'))}}" style="max-width: 350px; max-height: 300px;">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Logo</label>
                                            <input type="file" name="setting[logo]" accept="image/*" class="form-control" style="height: 44px !important;">
                                            @error('logo')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                       @if(_settings('logo'))
                                            <img class="ml-3 rounded" src="{{url('storage/'._settings('logo'))}}" style="max-width: 350px; max-height: 300px;">
                                       @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-2">
                                            <label for="">System Timezone</label>
                                            <select class="form-control" name="setting[timezone]">
                                                @foreach($timezone_identifiers as $key => $list)
                                                    @if($list == _settings('timezone'))
                                                        <option value="{{$list}}" selected>{{$list}}</option>
                                                    @else
                                                        <option value="{{$list}}">{{$list}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
{{--                                            <input value="{{_settings('timezone')}}" type="text" class="form-control" id="exampleInputName1" placeholder="System Timezone"  name="setting[timezone]" >--}}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-control-right custom-switch text-left mb-2">
                                            <input name="setting[language]" type="checkbox" class="custom-control-input" id="sc_rs_c" @if(_settings('language')==true) checked @endif>
                                            <label class="custom-control-label" for="sc_rs_c">Show Language Switcher?</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success float-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"><h2>Footer Settings</h2><hr></div>
                        <div class="card-body col-xl-11 mb-5 mx-auto bg-light">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                            <form class="forms-sample" action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h2 class="mt-3">About Footer</h2><hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Footer Logo</label>
                                            <input type="file"  name="setting[footer_logo]" accept="image/*" class="form-control" style="height: 44px !important;">
                                            @error('footer_logo')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        @if(_settings('footer_logo'))
                                            <img class="ml-3 mb-2 rounded" src="{{url('storage/'._settings('footer_logo'))}}" style="max-width: 350px; max-height: 300px;">
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>About Description</label>
                                            <textarea name="setting[footer_description]" cols="30" rows="6" class="form-control">{{_settings('footer_description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Social Link</label>
                                            <input type="url" name="setting[social_link]" class="form-control" value="{{_settings('social_link')}}" placeholder="Social Link">
                                            @error('social_link')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Copyright</label>
                                            <textarea name="setting[footer_copyright]" cols="30" rows="6" class="form-control">{{_settings('footer_copyright')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success float-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body col-xl-11 my-5 mx-auto bg-light">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                            <form class="forms-sample" action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h2 class="mt-3">Contact Info</h2><hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input value="{{_settings('address')}}" type="text"  name="setting[address]" placeholder="Address" class="form-control" style="height: 44px !important;">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input value="{{_settings('phone')}}" type="number"  name="setting[phone]" class="form-control" style="height: 44px !important;" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">E-mail</label>
                                            <input value="{{_settings('email')}}" type="email"  name="setting[email]" class="form-control" style="height: 44px !important;" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success float-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body col-xl-11 my-5 mx-auto bg-light">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                            <form class="forms-sample" action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h2 class="mt-3">Custom Script</h2><hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label>Header Custom Script</label>
                                            </div>
                                           <div class="col-md-9">
                                               <textarea name="setting[header_script]" cols="30" rows="6" class="form-control">{{_settings('header_script')}}</textarea>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label>Footer Custom Script</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea name="setting[footer_script]" cols="30" rows="6" class="form-control">{{_settings('footer_script')}}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success float-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"><h2>Global SEO</h2><hr></div>
                        <div class="card-body col-xl-11 mb-5 mx-auto bg-light">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                            <form class="forms-sample" action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Title</label>
                                            <input value="{{_settings('meta_title')}}" type="text" class="form-control" id="exampleInputName1" placeholder="Meta Title"  name="setting[meta_title]" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <input value="{{_settings('meta_keyword')}}" type="text" class="form-control" id="exampleInputName1" placeholder="Meta Keyword"  name="setting[meta_keyword]" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <div class="form-group">
                                            <textarea name="setting[meta_description]" cols="30" rows="10" class="form-control">{{_settings('meta_description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Meta Img</label>
                                            <input type="file" name="setting[img]" accept="image/*" class="form-control" style="height: 44px !important;">
                                            @error('img')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if(_settings('img'))
                                            <img class="ml-3 rounded" src="{{url('storage/'._settings('img'))}}" style="max-width: 350px; max-height: 300px;">
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-warning float-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection


