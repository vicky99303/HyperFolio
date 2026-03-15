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

<header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">HyperFolio</h1>
    <nav class="space-x-4">
        <a href="/" class="text-blue-600 hover:underline">Home</a>
        <a href="/about" class="text-blue-600 hover:underline">About</a>
        <a href="/skills" class="text-blue-600 hover:underline">Skills</a>
        <a href="/projects" class="text-blue-600 hover:underline">Projects</a>
        <a href="/contact" class="text-blue-600 hover:underline">Contact</a>
    </nav>
</header>

<main class="p-6">
    @yield('content')
</main>

<footer class="bg-white shadow p-4 mt-12 text-center">
    &copy; {{ date('Y') }} HyperFolio
</footer>

</body>
</html>