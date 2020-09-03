<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   
    {{-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> --}}
    @stack('styles')
    @stack('css')

  

</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div id="app">

   
 
    <!-- Navbar -->
    @yield('topbar')
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    @include('layouts.partial.sidebar')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" >
          <div class="container-fluid">
            <div class="row ">
            
              
            </div>
          </div><!-- /.container-fluid -->
        </section>
      
        <!-- Main content -->
        <section class="content " >
          @yield('content')
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      {{-- <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.5
        </div>
      </footer> --}}
    </div>
    <!-- /.content-wrapper -->
  
    <!-- Control Sidebar -->
    {{-- <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside> --}}
    <!-- /.control-sidebar -->
  
    <!-- Main Footer -->
    

  <!-- ./wrapper -->
</div>
              
              
          
            
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
{{-- 
<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script> --}}

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
{{-- <script src="{{asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script> --}}


<!-- OPTIONAL SCRIPTS -->
{{-- <script src="{{asset('dist/js/demo.js')}}}"></script> --}}



<!-- PAGE SCRIPTS -->
{{-- <script src="{{asset('dist/js/pages/dashboard2.js')}}}"></script> --}}
  
   
    @stack('scripts')
    @stack('js')

    <script>
     $('[data-widget="pushmenu"]').PushMenu('colapses')
     
    </script>

</body>
</html>
