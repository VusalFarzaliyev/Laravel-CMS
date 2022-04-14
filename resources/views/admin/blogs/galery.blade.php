@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/blogs"}}" class="breadcrumb-item"> Blogs</a>
                <span class="breadcrumb-item active">Images</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            @if (session('danger'))
                <div class="alert alert-danger text-center col-md-8 mx-auto">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                @if (session('success'))
                    <div class="alert alert-success text-center col-md-8 mx-auto">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card col-lg-8 mx-auto">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 >Galery</h6>
                    </div>
                        <div class="card-body">
                            @if(count($galeries)>0)
                            <div class="">
                                <table class="table">
                                    <thead>
                                    <tr role="row">
                                            @csrf
                                        <th>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" id="allCheck" class="custom-control-input">
                                                <span class="custom-control-label p-0"></span>
                                            </label>
                                        </th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>File info</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($galeries as $galery)
                                        <tr class="even">
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkbox" value="{{$galery->id}}" name="id[]">
                                                    <span class="custom-control-label p-0"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{asset('storage/'.$galery->name)}}" target="_blank" data-popup="lightbox">
                                                    <img src="{{asset('storage/'.$galery->name)}}" alt="" class="img-preview rounded" style="height: 80px; width: 120px">
                                                </a>
                                            </td>
                                            <td>{{$galery->name}}</td>
                                            <td>
                                                <ul class="list-unstyled mb-0">
                                                    <li><span class="font-weight-semibold">Size:</span>
                                                        @if(round(filesize('storage/'.$galery->name )>1048576,1))
                                                            {{round(filesize('storage/'.$galery->name )/1024/1024,1)}} MB
                                                        @else
                                                            {{round(filesize('storage/'.$galery->name )/1024,1)}} KB
                                                        @endif
                                                    </li>
                                                    <li><span class="font-weight-semibold">Format:</span> . {{pathinfo('storage/'.$galery->name, PATHINFO_EXTENSION)}}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href="{{url('/dashboard/blogs/galery/imageEdit/'.$galery->id)}}">
                                                    <i style="font-size: 25px" class="icon-pencil top-0 text-primary"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete list-icons-item ml-2" onclick="return confirm('Are you sure want to delete this user?')">
                                                    <i style="font-size: 25px" class="icon-bin top-0 text-danger"></i>
                                                    <form action="{{route('blog.imageDelete',$galery->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="datatable-footer">
                                <div class="float-right mb-1">
                                    <span >{{$galeries->links()}}</span>
                                </div>
                                <div class="float-left mb-1">
                                        <button class="btn btn-danger multi-delete" >
                                            <form action="{{route('blog.checkDelete')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" id="ids">
                                            </form>
                                            Check Delete
                                        </button>
                                </div>
                            </div>
                    @else
                        <tr class="col-lg-8 alert alert-danger">
                            <p class="text-center text-danger"><b>No Image</b></p>
                        </tr>
                    @endif
                        </div>
                </div>
            </div>
        </div>
        <script>
            $('.delete').on('click', function() {
                console.log($(this).find('form').submit())
            });
            $('#allCheck').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
            $('.multi-delete').on('click', function(e) {
                var allVals = [];
                $(".checkbox:checked").each(function() {
                    allVals.push($(this).val());
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to delete this row?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $('#ids').attr('value', join_selected_values);
                        $(this).find('form').submit()
                    }
                }
            });
        </script>
    @endsection
