<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ELMS</title>

    <!-- Bootstrap core CSS -->

    <link href="{{   asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
@include('layouts.elms_navbar')

<div class="container-fluid">
    <div class="row">
       @include('layouts.elms_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="app" >
           @yield('content')
        </main>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

<script>
    feather.replace()
</script>


</body>
</html>
