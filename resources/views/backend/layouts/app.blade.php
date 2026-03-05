<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | DigiStore</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-50">
    <div class="flex min-h-screen">
        {{-- SIDEBAR --}}
        <aside class="w-64 bg-slate-900 text-slate-300 flex-shrink-0 hidden md:flex flex-col">
            <div class="p-8">
                <a href="/" class="text-white text-2xl font-black tracking-tighter">
                    DIGI<span class="text-indigo-500">ADMIN</span>
                </a>
            </div>
            
            <nav class="flex-1 px-4 space-y-2">
                <a href="/admin" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->is('admin') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-800' }} transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="/admin/products" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->is('admin/products*') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-800' }} transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Manage Products
                </a>
            </nav>

            <div class="p-4 border-t border-slate-800">
                <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition-all text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Frontend
                </a>
            </div>
        </aside>

        {{-- CONTENT AREA --}}
        <div class="flex-1 flex flex-col">
            {{-- TOPBAR --}}
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
                <div class="text-sm font-medium text-slate-500">
                    Menu / <span class="text-slate-900 font-bold">Admin Panel</span>
                </div>

                <div class="flex items-center gap-6">
                    <div class="flex flex-col text-right">
                        <span class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-slate-500">Administrator</span>
                    </div>
                    
                    {{-- TOMBOL LOGOUT --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition-all shadow-sm group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </header>

            {{-- MAIN CONTENT --}}
            <main class="flex-1 p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>