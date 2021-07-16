<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Panel</title>
    <link rel="stylesheet" href="public/css/admin/favicon.ico">
    <link rel="stylesheet" href="{{ url('css/admin/styles.css') }}">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">

</head>

<body>
<div class="d-flex" id="wrapper">

@include('admin.sidebar.mobileSidebar')
<!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <div class="container-fluid px-0">
            @include('admin.top.header')
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
        @include('admin.footer.footer')

    </div>
</div>
<script src="{{ url('js/admin/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('js/admin.js') }}"></script>
</body>

</html>
