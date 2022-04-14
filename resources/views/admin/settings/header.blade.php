@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="breadcrumb">
            <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
            <span class="breadcrumb-item active">Theme Settings</span>
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
            </div>
        </div>
    </div>
@endsection


