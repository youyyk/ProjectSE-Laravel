<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>

    <title>@yield('title','Restaurant')</title>
</head>
<body class="bg-green-50">
@include('layouts.menu')

    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
