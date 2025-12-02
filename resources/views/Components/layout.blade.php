<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Little Green Man Store' }}</title>

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- HIDE NAVBAR SEARCH ONLY ON PRODUCTS PAGE -->
    <style>
        body.products-page header input[type="text"] {
            display: none;
        }
    </style>
</head>

<!-- ENABLE PAGE-SPECIFIC BODY CLASSES -->
<body class="bg-black text-white font-sans @yield('body-class')">

    <!-- NAVBAR -->
    <header class="bg-black border-b border-green-500 py-4">
        <div class="container mx-auto flex justify-between items-center">

            <!-- Logo + Search -->
            <div class="flex items-center gap-5">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12" />
                </a>

                <!-- NAVBAR SEARCH BAR (hidden on products page) -->
                <input 
                    type="text" 
                    placeholder="Search for our products here..."
                    class="px-4 py-2 rounded bg-black border border-green-500 text-green-300 w-80 placeholder-green-600"
                />
            </div>

            <!-- NAV LINKS -->
            <nav class="flex gap-6 text-lg font-bold">
                <a class="hover:text-green-400" href="/">Home</a>
                <a class="hover:text-green-400" href="/shop">Shop</a>
                <a class="hover:text-green-400" href="/customerSupport">Help</a>
                <a class="hover:text-green-400" href="/aboutUs">About</a>
                <a class="hover:text-green-400" href="/login">
                    <span class="material-symbols-outlined">person</span>
                </a>
                <a class="hover:text-green-400" href="/basket">
                    <span class="material-symbols-outlined">shopping_cart</span>
                </a>
            </nav>

        </div>
    </header>

    <!-- MAIN CONTENT SLOT -->
    <main class="container mx-auto px-6 py-10">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-black border-t border-green-500 py-4 mt-10">
        <div class="container mx-auto flex justify-between items-center">

            <p class="text-green-400">© 2025 Little Green Men</p>

            <div class="flex gap-4">
                <img src="{{ asset('images/facebook.png') }}" class="h-8" />
                <img src="{{ asset('images/tiktok.png') }}" class="h-8" />
                <img src="{{ asset('images/instagram.png') }}" class="h-8" />
                <img src="{{ asset('images/x.png') }}" class="h-8" />
            </div>

        </div>
    </footer>

</body>
</html>
