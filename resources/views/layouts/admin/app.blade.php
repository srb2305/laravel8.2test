<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.admin.header')
    @yield('internal_css') 
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 @include('layouts.admin.navbar')
     @include('layouts.admin.side')
  @yield('content')
  
  

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.admin.footer')
  @yield('footer_script')
</body>
</html>
