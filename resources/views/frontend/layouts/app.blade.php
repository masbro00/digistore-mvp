<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Store | Premium Assets for Developers</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
        }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 antialiased">

    <nav class="glass-nav sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-8">
                    <a href="/" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-indigo-200 shadow-lg">
                            <span class="text-white font-bold">D</span>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight text-slate-900">
                            Digi<span class="text-indigo-600">Store</span>
                        </span>
                    </a>

                    <div class="hidden md:flex items-center gap-6">
                        <a href="/" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition-colors">Home</a>
                        <a href="/products" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition-colors">All Products</a>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    @auth
                        <a href="/admin" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 px-4 py-2">Dashboard</a>
                    @else
                        <a href="/login" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 px-4 py-2">Login</a>
                        <a href="/register" class="bg-slate-900 text-white text-sm font-bold px-5 py-2.5 rounded-xl hover:bg-slate-800 transition-all shadow-md active:scale-95">
                            Get Started
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-500 text-sm">© 2026 DigiStore Project. Built with Laravel 10 & ☕</p>
        </div>
    </footer>

</body>
</html>