@extends('layouts.frontend')

@section('content')
<div class="min-h-[calc(100vh-80px)] flex items-center justify-center bg-[#f8fafc] px-6 py-12">
    <div class="max-w-md w-full">
        {{-- Header --}}
        <div class="text-center mb-10">
            <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Create Account</h1>
            <p class="text-slate-500 font-medium">Gabung dengan komunitas DigiStore hari ini.</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 p-10">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Full Name</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                           class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all font-medium placeholder:text-slate-300"
                           placeholder="Masukkan nama lengkap kamu">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                    <input id="email" type="email" name="email" :value="old('email')" required 
                           class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all font-medium placeholder:text-slate-300"
                           placeholder="@gmail.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" 
                           class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all font-medium placeholder:text-slate-300"
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                           class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all font-medium placeholder:text-slate-300"
                           placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-2xl font-black text-lg transition-all shadow-lg shadow-indigo-600/20 active:scale-95">
                        Register Now
                    </button>
                </div>

                <p class="text-center text-sm text-slate-500 font-medium mt-6">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline">Log in</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection