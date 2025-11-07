<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('pagetitle')</title>
</head>
<body>
    @include('Admin.Partials.header')
    @include('Admin.Partials.sidebar')
    <main class="main">
         @yield('content')
    </main>
   
</body>
</html>
