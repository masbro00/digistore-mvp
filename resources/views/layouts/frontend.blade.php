<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiStore | Premium Digital Assets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Menggunakan font yang lebih modern --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900">

    {{-- Navbar Premium --}}
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            
            {{-- Branding --}}
            <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter hover:opacity-80 transition-opacity">
                DIGI<span class="text-indigo-600">STORE</span>
            </a>

            {{-- Navigasi Tengah --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-sm font-bold {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-slate-500 hover:text-slate-900' }} transition-colors">
                    Home
                </a>
                <a href="{{ route('products.index') }}" class="text-sm font-bold {{ request()->routeIs('products.*') ? 'text-indigo-600' : 'text-slate-500 hover:text-slate-900' }} transition-colors">
                    All Products
                </a>
            </div>

            {{-- Bagian Navigasi Kanan (User Area) --}}
            <div class="flex items-center gap-4">
                @auth
                    {{-- CEK APAKAH DIA ADMIN --}}
                    @if(auth()->user()->usertype === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors px-4 py-2">
                            Admin Panel
                        </a>
                    @else
                        {{-- FIX: Mengarah ke rute My Assets yang baru dibuat --}}
                        <a href="{{ route('my.assets') }}" class="text-sm font-bold {{ request()->routeIs('my.assets') ? 'text-indigo-600' : 'text-slate-700 hover:text-indigo-600' }} transition-colors px-4 py-2">
                            My Assets
                        </a>
                    @endif

                    {{-- Tombol Logout --}}
                    <form action="{{ route('logout') }}" method="POST" class="inline ml-2">
                        @csrf
                        <button class="bg-slate-900 text-white text-sm font-bold px-6 py-2.5 rounded-xl hover:bg-slate-800 transition-all shadow-lg active:scale-95">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- Tampilan jika BELUM Login --}}
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-500 hover:text-slate-900 px-4 py-2 transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white text-sm font-bold px-6 py-2.5 rounded-xl hover:bg-indigo-700 transition-all shadow-lg active:scale-95">
                        Get Started
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Content Area --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-slate-100 py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-slate-400 text-sm font-medium">
                &copy; {{ date('Y') }} DigiStore. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>