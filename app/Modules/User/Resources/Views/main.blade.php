<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exam System - User</title>

    <!-- The css load -->
    @include('user::assets.css')
</head>

<body>
    <!-- The navigator -->
    @include('user::layouts.navigation')


    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>
    
    <!-- The footer -->
    @include('user::layouts.footer')

</body>
</html>

<!-- The javascript load-->
@include('user::assets.script')

<!-- extend javascript code from template -->
@yield('javascript')
