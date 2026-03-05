@extends('layouts.frontend')

@section('content')
<div class="min-h-[calc(100vh-80px)] flex items-center justify-center bg-[#f8fafc] px-6 py-12">
    <div class="max-w-md w-full">
        {{-- Header --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-black text-slate-900 tracking-tight mb-2">Welcome Back</h1>
            <p class="text-slate-500 font-medium italic">Masuk untuk mengelola aset digitalmu.</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 p-10">
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                {{-- Email Address --}}
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                           class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all font-medium placeholder:text-slate-300"
                           placeholder="alex@example.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-bold text-red-500" />
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex justify-between items-center mb-2 ml-1">
                        <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-widest">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-indigo-600 hover:underline uppercase tracking-tighter">
                                Forgot?
                            </a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all font-medium placeholder:text-slate-300"
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-bold text-red-500" />
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center ml-1">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded-lg border-slate-200 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm font-medium text-slate-500 group-hover:text-slate-700 transition-colors">Ingat saya</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-slate-900 hover:bg-indigo-600 text-white py-4 rounded-2xl font-black text-lg transition-all shadow-lg shadow-slate-900/10 active:scale-95">
                        Log In
                    </button>
                </div>

                <p class="text-center text-sm text-slate-500 font-medium mt-8">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:underline">Daftar sekarang</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection