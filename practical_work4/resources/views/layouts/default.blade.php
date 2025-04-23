<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    @yield('head')
</head>
<body>
    @include('includes.header')
    <div class="content">
        @yield('content')
    </div>
    @include('includes.footer')
</body>
</html>