<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name'))</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 font-sans antialiased">
        <header class="bg-white shadow-sm">
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ route('products.index') }}" class="text-xl font-bold text-gray-900">
                    {{ config('app.name', 'Toko UMKM') }}
                </a>

                <div class="flex items-center gap-4">
                    <a href="{{ route('products.index') }}"
                       class="text-sm font-medium text-gray-700 hover:text-gray-900">
                        Katalog
                    </a>

                    @auth
                        <a href="{{ route('profile.edit') }}"
                           class="text-sm font-medium text-gray-700 hover:text-gray-900">
                            Profil
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-sm font-medium text-gray-700 hover:text-gray-900">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}"
                           class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                            Daftar
                        </a>
                    @endauth
                </div>
            </nav>
        </header>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        <footer class="border-t border-gray-200 bg-white">
            <div class="mx-auto max-w-7xl px-4 py-6 text-center text-sm text-gray-500 sm:px-6 lg:px-8">
                &copy; {{ date('Y') }} {{ config('app.name', 'Toko UMKM') }}. Semua hak dilindungi.
            </div>
        </footer>
    </body>
</html>
