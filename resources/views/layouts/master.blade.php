<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
@yield('content')
<script src="{{asset('js/jquery.min.js')}}" ></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>    
@yield('scripts')
</body>
</html>