<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>snapcheck</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo/snapcheck logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    @notifyCss
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-800">
       
    @include('component.navbar-main')

   
        @yield('content')
   
    
    @include('component.footer-main')

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

   
    <x-notify::notify />
    @notifyJs
</body>
</html>