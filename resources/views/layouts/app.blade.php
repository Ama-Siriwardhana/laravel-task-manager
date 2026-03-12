<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gray-500 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if(session('success'))
        <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            background: '#d1fae5',
            color: '#065f46',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
        </script>
        @endif

        @if(session('delete'))
        <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ session('delete') }}',
            background: '#fee2e2',
            color: '#7f1d1d',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
        </script>
        @endif

        @if(session('login'))
        <script>
        Swal.fire({
            icon: 'success',
            title: "<span style='font-size:16px'>{{ session('login') }}</span>",
            position: 'center',
            background: '#d1fae5',
            color: '#065f46',
            showConfirmButton: false,
            timer: 2000,
            width: '600px',
            customClass: {
                popup: 'rounded-2xl shadow-xl py-6 px-3'
            },
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });       
        </script>
        @endif

        @if(session('register'))
        <script>
        Swal.fire({
            icon: 'success',
            title: "<span style='font-size:16px'>{{ session('register') }}</span>",
            position: 'center',
            background: '#d1fae5',
            color: '#065f46',
            showConfirmButton: false,
            timer: 2000,
            width: '600px',
            customClass: {
                popup: 'rounded-2xl shadow-xl py-6 px-3'
            },
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });       
        </script>
        @endif
    </body>
</html>
