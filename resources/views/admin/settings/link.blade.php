@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="breadcrumb">
            <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
            <span class="breadcrumb-item active">Theme Link Settings</span>
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
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#header" class="nav-link active" data-toggle="tab">Header</a></li>
                                <li class="nav-item"><a href="#footer" class="nav-link" data-toggle="tab">Footer</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="header">
                                    <form action="{{route('setting.theme-link-header')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" placeholder="Page" name="page">
                                                @error('page')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" placeholder="/slug" name="slug">
                                                @error('slug')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-primary">Create</i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        @if(count($headers) > 0)
                                            @foreach($headers as $header)
                                                <div class="row mb-2">
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" disabled="" value="{{$header->page}}">
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" disabled="" value="/{{$header->slug}}">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a href="{{route('setting.theme-link-delete',$header->id)}}" type="button" class="btn btn-outline-danger border-transparent btn-icon rounded-pill ml-2"><i class="icon-close2"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-xl-6 mx-auto">
                                                <span class="text-danger ml-5">Header Links Empty</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="footer">
                                    <form action="{{route('setting.theme-link-footer')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" placeholder="Page" name="page">
                                                @error('page')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" placeholder="/slug" name="slug">
                                                @error('slug')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-primary">Create</i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        @if(count($footers) > 0)
                                            @foreach($footers as $footer)
                                                <div class="row mb-2">
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" disabled="" value="{{$footer->page}}">
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" disabled="" value="/{{$footer->slug}}">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a href="{{route('setting.theme-link-delete',$footer->id)}}" type="button" class="btn btn-outline-danger border-transparent btn-icon rounded-pill ml-2"><i class="icon-close2"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-xl-6 mx-auto">
                                                <span class="text-danger ml-5">Footer Links Empty</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
