@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">Settings / Language</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-11 mx-auto">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    @if($layout == 'index')
                        <div class="col-xl-5">
                            <form action="{{route('setting.language.create')}}" method="post" >
                                @csrf
                               <fieldset class="mb-1">
                                   <legend class="text-uppercase font-size-sm font-weight-bold">Create Language</legend>
                                   <div class="form-group row">
                                       <label class="col-form-label col-lg-2">Name <span class="text-danger"> * </span></label>
                                       <div class="col-lg-10">
                                           <input value="{{old('name')}}" type="text" class="form-control" name="name">
                                           @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                       </div>
                                   </div>
                                   <div class="form-group row">
                                       <label class="col-form-label col-lg-2">Code <span class="text-danger"> * </span></label>
                                       <div class="col-lg-10">
                                           <input value="{{old('code')}}" type="text" class="form-control" name="code">
                                           @error('code')<span class="text-danger">{{$message}}</span>@enderror
                                       </div>
                                   </div>
                                   <div class="form-group ">
                                       <button type="submit" class="btn btn-primary float-right">Add New Language</button>
                                   </div>
                               </fieldset>
                            </form>
                        </div>
                    @elseif($layout == 'edit')
                        <div class="col-xl-5">
                            <form action="{{route('setting.language.update',$language->id)}}" method="post" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Name <span class="text-danger"> * </span></label>
                                    <div class="col-lg-10">
                                        <input value="{{$language->name}}" type="text" class="form-control" name="name">
                                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Code <span class="text-danger"> * </span></label>
                                    <div class="col-lg-10">
                                        <input value="{{$language->code}}"  type="text" class="form-control" name="code">
                                        @error('code')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                               <div class="form-group">
                                   <button type="submit" class="btn btn-info float-right">Update Language</button>
                               </div>
                            </form>
                        </div>
                    @endif
                    <div class="col-xl-7">
                        @if(count($languages) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="bg-primary text-white">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($languages as $language)
                                            <tr>
                                                <td>{{$language->id}}</td>
                                                <td>{{$language->name}}</td>
                                                <td>{{$language->code}}</td>
                                                <td>
                                                    <a href="{{route('setting.language.edit',$language->id)}}" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                    <a href="" class="btn btn-danger"><i class="icon-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                        <div class="alert alert-danger mt-5 text-center">
                            <span >
                                Empty
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



