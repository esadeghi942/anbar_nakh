<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <!-- Basic -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="elham sadeghi">
    <link href="{{asset('img/favicon.ico')}}" rel="icon">
    <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')
    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{asset('/assets/css/vendors/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/prism.css')}}">

    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/custom_style.css')}}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/rating.css')}}">
    <link href="{{asset('css/persian-datepicker.min.css')}}" rel="stylesheet">
@yield('css')
<!-- [if lt IE 9] -->
</head>
<body>
<!-- LOADER -->
@yield('content')
<script src="{{asset('/assets/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>

<script>
    $(document).on("click", "span.show-password", function (e) {
        var input = $(this).prev('input');
        if (input.attr('type') == 'text')
            input.attr('type', 'password');
        else
            input.attr('type', 'text');
    });

    @if($errors->any())
    swal("{{implode('\n',$errors->all())}}", {
        icon: "error",
        button: "بستن"
    });
    @endif
    @if(session('danger'))
    swal("{{session('danger')}}", {
        icon: "error",
        button: "بستن"
    });
    @endif

    @if(session('warninig'))
    swal("{{session('warninig') }}", {
        icon: "warning",
        timer: 2000,
        buttons: false,
    });
    @endif

    @if(session('success'))
    swal("{{ session('success') }}", {
        icon: "success",
        timer: 2000,
        buttons: false,
    });
    @endif
</script>
@yield('js')
</body>
</html>

