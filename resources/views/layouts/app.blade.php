@include('layouts.partials.header')
    <div class="wrapper">
        {{-- Navbar --}}
        @include('layouts.partials.nav')

        {{-- Left side column. contains the logo and sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            <div class="container mt-3">
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->
        {{-- <div class="container">
            <router-view></router-view>
        </div> --}}
        {{--  Main Footer Content   --}}
        @include('layouts.partials.footerContent')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

@include('layouts.partials.footer')