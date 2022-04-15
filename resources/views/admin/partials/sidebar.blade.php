<div class="page-content">
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
        <div class="sidebar-content">
            <div class="sidebar-section sidebar-user my-1">
                <div class="sidebar-section-body">
                    <div class="media">
                        <a href="{{"/dashboard"}}" class="mr-3">
                            <img src="/assets/admin/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" alt="">
                        </a>
                        <div class="media-body">
                            <div class="font-weight-semibold">{{auth()->user()->name }} {{auth()->user()->surname}}</div>
                        </div>

                        <div class="ml-3 align-self-center">
                            <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="icon-transmission"></i>
                            </button>

                            <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                                <i class="icon-cross2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-section">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                    <li class="nav-item">
                        <a href="{{"/dashboard"}}" class="nav-link @if(Request::segment(2) == (''))active @endif">
                            <i class="icon-home4"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Layouts</div> <i class="icon-menu" title="Layouts"></i></li>
{{--                    @can('read-permissions')--}}
{{--                        <li class="nav-item"><a  href="{{"/dashboard/permissions"}}" class="nav-link @if(Request::segment(2) == ('permissions'))active @endif"><i class="icon-newspaper2"></i><span>Permissions</span></a></li>--}}
{{--                    @endcan--}}
                    @can('read-pages')
                        <li class="nav-item"><a  href="{{"/dashboard/pages"}}" class="nav-link @if(Request::segment(2) == ('pages'))active @endif"><i class="icon-stack2"></i><span>Pages</span></a></li>
                    @endcan
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-blog"></i> <span>Blogs</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Content styling">
                            @can('read-blogs')
                                <li class="nav-item"><a  href="{{"/dashboard/blogs"}}" class="nav-link @if(Request::segment(2) == ('blogs'))active @endif"><span>Posts</span></a></li>
                            @endcan
                            @can('read-categories')
                                <li class="nav-item"><a  href="{{"/dashboard/categories"}}" class="nav-link @if(Request::segment(2) == ('categories'))active @endif"><span>Categories</span></a></li>
                            @endcan
{{--                            <li class="nav-item"><a  href="{{"/dashboard/tags"}}" class="nav-link @if(Request::segment(2) == ('tags'))active @endif"><span>Tags</span></a></li>--}}
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-gear"></i><span>Settings</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Content styling">
                            <li class="nav-item"><a  href="{{"/dashboard/settings/general"}}" class="nav-link @if(Request::segment(3) == ('general'))active @endif"><span>General</span></a></li>
                            <li class="nav-item"><a  href="{{"/dashboard/settings/theme-links"}}" class="nav-link @if(Request::segment(3) == ('theme-links'))active @endif"><span>Theme Links</span></a></li>
                            <li class="nav-item"><a  href="{{"/dashboard/settings/languages"}}" class="nav-link @if(Request::segment(3) == ('languages'))active @endif"><span>Language</span></a></li>
                            <li class="nav-item"><a  href="{{"/dashboard/settings/smtp"}}" class="nav-link @if(Request::segment(3) == ('smtp'))active @endif"><span>SMTP</span></a></li>
                            <li class="nav-item"><a  href="{{"/dashboard/settings/facebook"}}" class="nav-link @if(Request::segment(3) == ('facebook'))active @endif"><span>Facebook</span></a></li>
                            <li class="nav-item"><a  href="{{"/dashboard/settings/google"}}" class="nav-link @if(Request::segment(3) == ('google'))active @endif"><span>Google</span></a></li>
                        </ul>
                    </li>

                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-user-lock"></i> <span>Platform Administration</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Content styling">
                            @can('read-users')
                                <li class="nav-item">
                                    <a  href="{{"/dashboard/users"}}" class="nav-link @if(Request::segment(2) == ('users')) active @endif">
                                        <span>Users</span>
                                    </a>
                                </li>
                            @endcan
                            @can('read-roles')
                                <li class="nav-item"><a  href="{{"/dashboard/roles"}}" class="nav-link @if(Request::segment(2) == ('roles'))active @endif"><span>Role And Permissions</span></a></li>
                            @endcan
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="content-wrapper" >
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><span class="font-weight-semibold"></span> </h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>

                </div>
