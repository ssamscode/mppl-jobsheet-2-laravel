<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Merch Store</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/templates/user/img/fav.png') }}">

    <!-- CSS -->
    @include('layouts.user.style')
</head>
<body>
    <!-- SweetAlert -->
    @include('sweetalert::alert')

    <!-- Navbar -->
    @include('layouts.user.navbar')

    <!-- Konten halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.user.footer')

    <!-- JS -->
    @include('layouts.user.script')
</body>
</html>