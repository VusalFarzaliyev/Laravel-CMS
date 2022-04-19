@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">Tags</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        @if (session('danger'))
            <div class="alert alert-danger text-center col-md-6 mx-auto">
                {{ session('danger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success text-center col-md-6 mx-auto">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                @if(count($tags)>0)
                                <table class="table">
                                    <thead>
                                    <tr class="table-border-solid">
                                        <th>Tag Name</th>
                                        <th>Blogs</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $key=>$tag)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td><a href="{{route('tag.show',$key)}}">{{count($tag)}} <i class="icon-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="alert alert-danger text-center mt-2" role="alert">
                                        Empty
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
