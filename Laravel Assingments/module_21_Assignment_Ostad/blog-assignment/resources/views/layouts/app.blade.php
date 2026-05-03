<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.frontend.head')
</head>
<body class="bg-light min-h-screen">

<!-- Navbar -->
    @include('partials.frontend.navbar')

<!-- Page Content -->

    <main>
        @yield('content')
    </main>

<!-- Footer -->

    <footer class="bg-dark text-white py-12">
        @include('partials.frontend.footer')
    </footer>

</body>
</html>