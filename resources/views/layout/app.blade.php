<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel app</title>
    @yield('styles')
</head>

<body>
    <h1>@yield('title')</h1>
    <h5>
        @if (session()->has('session'))
            <div>{{ session('success') }}</div>
        @endif
    </h5>
    <div>@yield('content')</div>
</body>

</html>
