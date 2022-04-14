@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">Pages</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success text-center col-md-10 mx-auto">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('danger'))
                            <div class="alert alert-danger text-center col-md-10 mx-auto">
                                {{ session('danger') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="float-left">
                            <a href="{{'/dashboard/pages/create'}}" class="btn btn-warning ml-3"><i class="icon-add"></i> Add New</a>
                        </div>
                        <div class="float-right mr-5">
                            <span >{{$pages->links()}}</span>
                        </div>
                        <div class="table-responsive pt-3">
                            @if(count($pages) > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            URL
                                        </th>
                                        <th>
                                            Operation
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>{{$page->id}}</td>
                                            <td>{{$page->title}}</td>
                                            <td>
                                                {{url('').'/'.$page->link}}
                                            </td>
                                            <td>
                                                <a href="{{'/dashboard/pages/edit/'.$page->id}}" class="list-icons-item text-primary"><i style="font-size: 25px" class="icon-pencil7"></i></a>
                                                <a href="{{'/dashboard/pages/delete/'.$page->id}}" class="list-icons-item ml-2 text-danger" onclick="return confirm('Are you sure want to delete this blog?')"><i style="font-size: 25px" class="icon-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <tr>
                                    <div class="alert alert-warning text-center col-md-8 mx-auto">
                                        Empty
                                    </div>
                                </tr>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



