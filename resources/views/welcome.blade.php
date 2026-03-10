<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Task Manager') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-5xl font-bold mb-6">
            Welcome to Task Manager
        </h1>

        <p class="text-lg mb-8">
            Manage your tasks easily and stay organized.
        </p>

        <a href="{{ route('login') }}"
           class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-800">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="bg-green-600 text-white px-6 py-3 rounded-lg shadow hover:bg-green-800 ml-4">
            Register
        </a>
    </div>
</body>
</html>
