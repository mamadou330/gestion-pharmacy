<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
{{-- <!-- jQuery UI 1.11.4 --> --}}
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}")}}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{-- page_scripts =>  fichier js qui doivent etre inclus seulement sur certaines pages --}}
@stack('page_scripts')

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

{{-- <script src="sweetalert2.all.min.js"></script> --}}

{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

</body>
</html>
