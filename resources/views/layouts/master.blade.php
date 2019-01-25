
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ELMS</title>
    <meta name="description" content="ELMS">
    <meta name="author" content="ELMS">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/images/logo.png')}} ">

    <!-- Bootstrap CSS -->
    <link href=" {{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="{{asset('admin/font-awesome/css/font-awesome.min.css')}} " rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <!-- END CSS for this page -->

</head>

<body class="adminbody">

<div id="main" >

    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="content-page" id="app">

       @yield('content')

    </div>
    <!-- END content-page -->

@include('layouts.footer')

</div>
<!-- END main -->

<script src="{{asset('admin/js/modernizr.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{asset('admin/js/moment.min.js')}}"></script>

<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

<script src="{{asset('admin/js/detect.js')}}"></script>
<script src="{{asset('admin/js/fastclick.js')}}"></script>
<script src="{{asset('admin/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>

<!-- App js -->
<script src="{{asset('admin/js/pikeadmin.js')}}"></script>

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Counter-Up-->
<script src="{{asset('admin/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin//plugins/counterup/jquery.counterup.min.js')}}"></script>

<script>
    $(document).ready(function() {
        // data-tables
        $('#example1').DataTable();

        // counter-up
        $('.counter').counterUp({
            delay: 10,
            time: 600
        });
    } );
</script>



</body>

</html>