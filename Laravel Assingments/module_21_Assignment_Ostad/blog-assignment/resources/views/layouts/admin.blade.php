<!DOCTYPE html>
<html lang="bn">

<head>
    @include('partials.admin.head')
</head>

<body class="bg-light min-h-screen">
<!-- Sidebar -->
    <div class="flex">
        @include('partials.admin.sidebar')

<!-- Main Content -->
        <main class="flex-1 ml-64">
            @yield('content')
        </main>
    </div>
</body>
 
</html>
    <!-- Top Header
    @include('partials.admin.header') -->