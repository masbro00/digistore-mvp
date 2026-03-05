@extends('frontend.layouts.app') {{-- Pastikan path layout benar --}}

@section('content')

{{-- HERO --}}
<div class="relative bg-[#0f172a] overflow-hidden">
    {{-- Dekorasi Cahaya di Background --}}
    <div class="absolute top-0 right-0 -translate-y-12 translate-x-12 blur-3xl opacity-20">
        <div class="aspect-square w-[400px] rounded-full bg-gradient-to-tr from-indigo-500 to-purple-600"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto text-center px-6 py-28 md:py-36">
        <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-500/10 text-indigo-400 text-sm font-bold tracking-wide mb-6 border border-indigo-500/20">
            STOK TERBATAS: BUNDLE LARAVEL 11
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 tracking-tight">
            Digital Products for <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">Laravel Developers</span>
        </h1>

        <p class="text-slate-400 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
            eBook, Source Code, dan Video Course premium untuk membangun aplikasi skala enterprise lebih cepat.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('products.index') }}"
               class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-600/25 transform hover:-translate-y-1">
                Browse Products
            </a>
            <a href="#featured"
               class="inline-block bg-slate-800 hover:bg-slate-700 text-white px-10 py-4 rounded-2xl font-bold transition-all border border-slate-700">
                Learn More
            </a>
        </div>
    </div>
</div>

{{-- FEATURED PRODUCTS --}}
<section id="featured" class="max-w-7xl mx-auto px-6 py-24">
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
        <div>
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">
                Featured Products
            </h2>
            <p class="text-slate-500 mt-2 text-lg">Pilih aset digital terbaik untuk project kamu.</p>
        </div>
        <a href="{{ route('products.index') }}" class="text-indigo-600 font-bold hover:text-indigo-700 transition-colors flex items-center gap-2">
            Lihat Semua <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
        @foreach ($products as $product)
            <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm p-5 flex flex-col transition-all duration-500 hover:shadow-2xl hover:shadow-indigo-500/10 hover:-translate-y-2">
                {{-- Mockup Image Placeholder --}}
                <div class="aspect-video bg-slate-50 rounded-2xl mb-6 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/5 to-purple-600/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <svg class="w-12 h-12 text-slate-300 group-hover:text-indigo-400 group-hover:scale-110 transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>

                <div class="px-2">
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">
                        {{ $product->name }}
                    </h3>

                    <p class="text-slate-500 text-sm leading-relaxed mb-6">
                        {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                    </p>

                    <div class="flex items-center justify-between mt-auto pt-5 border-t border-slate-50">
                        <div>
                            <span class="block text-xs text-slate-400 font-semibold uppercase tracking-wider">Harga</span>
                            <span class="text-2xl font-black text-slate-900">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>
                        
                        <a href="{{ route('products.show', $product) }}"
                           class="inline-flex items-center justify-center w-12 h-12 bg-slate-900 text-white rounded-xl hover:bg-indigo-600 transition-all shadow-md group-hover:rotate-12">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- CTA BAWAH --}}
<section class="max-w-7xl mx-auto px-6 mb-24">
    <div class="bg-indigo-600 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl shadow-indigo-600/20">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 0 L100 0 L100 100 L0 100 Z" fill="url(#grid)"></path>
                <defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"></path></pattern></defs>
            </svg>
        </div>

        <div class="relative z-10">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">
                Siap Bangun Project Lebih Cepat?
            </h2>

            <p class="text-indigo-100 text-lg mb-10 max-w-xl mx-auto">
                Gabung dengan 1,000+ developer yang sudah menggunakan aset kami untuk mempercepat workflow kerja mereka.
            </p>

            <a href="{{ route('products.index') }}"
               class="bg-white text-indigo-600 hover:bg-indigo-50 px-10 py-4 rounded-2xl font-extrabold transition-all shadow-xl active:scale-95">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

@endsection