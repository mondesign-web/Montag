<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>
 

</head>
<body class="bg-gray-100 font-sans">

    @include('partials.sidebar')

    <div class="flex flex-col min-h-screen lg:ml-[300px]">
        @include('partials.header')

        <main class="flex-1 bg-gray-100 p-4">
            @yield('content')
        </main>
    </div>

    <script>
        function dropdown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }

        function openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        }
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
