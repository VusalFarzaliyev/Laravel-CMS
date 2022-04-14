@extends("admin.layouts.layout1")
@section('content')
           <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <span class="breadcrumb-item active"> <i class="icon-home2 mr-2"></i>Dashboard</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
    <div class="content">
        <div class="row">
            <div class="col-xl-12">

            </div>
        </div>
    </div>
<script src="/assets/admin/auth/js/main.js"></script>
  @if(session('success'))
  <script>
  setTimeout(function() { alert("{{session('success')}}"); }, 100);
  </script>
           @endif
@endsection
