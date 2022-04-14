@extends("admin.layouts.layout1")
@section('content')
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{"/dashboard"}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <a href="{{"/dashboard/pages"}}" class="breadcrumb-item"> Pages</a>
                <span class="breadcrumb-item active">Create</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row">
            @if (session('danger'))
                <div class="alert alert-danger text-center col-md-6 mx-auto">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{route('page.store')}}" >
                            @csrf
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">New Page</legend>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Title <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" name="title" class="form-control"  placeholder="Page Title">
                                        @error('title')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Link <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{url('/')}}/</i></span>
                                            </div>
                                            <input type="text" name="link" class="form-control" placeholder="link">
                                        </div>
                                        @error('link')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Description <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <textarea id="summary-ckeditor" rows="5" cols="5" name="desc" class="form-control"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mb-3">
                            <legend class="text-uppercase font-size-sm font-weight-bold border-bottom">Seo Fields</legend>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Meta Title <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="seo_title" class="form-control"  placeholder="Meta Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Meta Title <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="seo_keyword" class="form-control"  placeholder="Meta Keyword">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Meta Description <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea  rows="5" cols="5" name="seo_desc" class="form-control"></textarea>
                                </div>
                            </div>
                                <div class="float-right">
                                    <button class="btn btn-warning mr-2" type="submit">Create Page</button>
                                </div>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
