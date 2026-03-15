<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HyperFolio</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@1.9.3"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

<header class="bg-white shadow p-4">
    <h1 class="text-2xl font-bold">HyperFolio</h1>
</header>

<main class="p-6">
    @yield('content')
</main>

<footer class="bg-white shadow p-4 mt-12 text-center">
    &copy; {{ date('Y') }} HyperFolio
</footer>

</body>
</html>