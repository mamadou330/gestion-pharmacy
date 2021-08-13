<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2A2A3E; box-shadow: 2px 8px 20px 0px #000">
    <a href="{{ route('home') }}" class="brand-link rounded-bottom" style="background-color: #2A2A3E; box-shadow: 2px 4px 7px 0px #000">
        <!-- Brand Logo -->
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image-xs img-circle elevation-2" style="opacity: .8">
            {{-- <i class="nav-icon fas fa-home text-white mx-auto text-center"></i> --}}
        <span class="brand-text badge badge-pill badge-info p-3 font-weight-bolder text-light ml-4 text-center" id="pharmacy_name">{{ config('app.name') }}</span>
    </a>
    <div class="clearfix"></div>

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel clearfix mt-4 p-3 d-flex mb-3 w-100" style="box-shadow: 0px 0px 0px 0px #080808;">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info" >
                <a href="#" class="d-block text-justify">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
    
        <nav class="mt-2">        
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.partials.menu')
            </ul>
        </nav>
    </div>

</aside>

