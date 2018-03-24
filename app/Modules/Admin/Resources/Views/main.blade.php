<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exam System - Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Load css -->
    @include('admin::assets.css')
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- Header -->
      @include('admin::layouts.header')

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section>
          <aside class="main-sidebar">
              <!-- sidebar -->
              @include('admin::layouts.slidebar')
          </aside>
        </section>   

        <!-- Main content -->
        <div>
          @yield('content')
        </div>

      </div>
      <!-- Footer -->
      @include('admin::layouts.footer')
    </div>

  </body>
</html>
@include('admin::assets.script')
@yield('javascript')
<!-- Load Javascript-->