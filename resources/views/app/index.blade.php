<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HOMA</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- CSS LINK -->
    <link href="{{url('css/app.css')}}" rel="stylesheet">

</head>

<body>

    @include('app.top.header')

    @yield('content')

    @include('app.down.footer')


    <!-- JS LINK -->
    <script src="{{url('js/app.js')}}"></script>
</body>

</html>
