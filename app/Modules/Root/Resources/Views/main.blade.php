<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exam System - Root</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Load css -->
    @include('root::assets.css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Header -->
    @include('root::layouts.header')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section>
            <aside class="main-sidebar">
                <!-- sidebar -->
                @include('root::layouts.slidebar')
            </aside>
        </section>

        <!-- Main content -->
        <div>
            <!-- extend content from template-->
            @yield('content')
        </div>

    </div>

</div>
<!-- Footer -->
@include('root::layouts.footer')
</body>
</html>
<!-- Load Javascript-->
@include('root::assets.script')

<!-- extend javascript code from template-->
@yield('javascript')
