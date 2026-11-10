<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel MVC')</title>
    @include('partials.assets')
</head>
<body class="d-flex flex-column min-vh-100">

    @hasSection('guest')
    @else
        <x-navbar :username="$username" />
    @endif

    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>