<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Hackfest') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower/Ionicons/css/ionicons.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @stack('styles-head')
    @stack('scripts-head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('layouts.partials.headers.default')
    @include('layouts.partials.menus.mp')
    <div class="content-wrapper">
        <section class="content-header">
            @yield('content-header')
        </section>
        @include('layouts.partials.system-alerts')
        <section class="content">
            @yield('content')
        </section>

    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
{{--<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>--}}
<script src="{{asset('bower/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower/jquery-ui/jquery-ui.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower/fastclick/lib/fastclick.js')}}"></script>

<!-- SlimScroll -->
<script src="{{asset('bower/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();
    });
</script>

@stack('scripts-footer')

</body>
</html>
