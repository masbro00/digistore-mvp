@extends('frontend.layouts.app')

@section('content')
<div class="bg-[#f8fafc] min-h-screen pb-20">
    {{-- Breadcrumbs --}}
    <nav class="max-w-7xl mx-auto px-6 py-8">
        <ol class="flex items-center space-x-2 text-sm text-slate-500 font-medium">
            <li><a href="/" class="hover:text-indigo-600 transition-colors">Home</a></li>
            <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
            <li><a href="{{ route('products.index') }}" class="hover:text-indigo-600 transition-colors">Products</a></li>
            <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
            <li class="text-slate-900 truncate">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            {{-- Bagian Kiri: Preview & Deskripsi (8 Kolom) --}}
            <div class="lg:col-span-8">
                {{-- Main Preview --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden mb-10">
                    <div class="aspect-video bg-slate-900 flex items-center justify-center relative">
                        {{-- Placeholder Image / Logo --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 to-transparent"></div>
                        <svg class="w-24 h-24 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                </div>

                {{-- Tab Content (Deskripsi) --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Tentang Produk Ini</h2>
                    <div class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed">
                        {!! nl2br(e($product->description)) !!}
                    </div>

                    <hr class="my-10 border-slate-100">

                    {{-- Features List --}}
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Apa yang kamu dapatkan?</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach(['Source Code Lengkap', 'Dokumentasi PDF', 'Akses Grup Support', 'Lifetime Update'] as $feature)
                        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div class="flex-shrink-0 w-6 h-6 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="font-semibold text-slate-700">{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan: Pricing & Buy Card (4 Kolom) --}}
            <div class="lg:col-span-4">
                <div class="sticky top-24">
                    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-xl shadow-indigo-500/5 p-8">
                        <div class="mb-6">
                            <span class="text-sm font-bold text-indigo-600 uppercase tracking-widest">Harga Lisensi</span>
                            <div class="flex items-baseline gap-1 mt-1">
                                <span class="text-4xl font-black text-slate-900">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 text-sm text-slate-600">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                Keamanan Transaksi Terjamin
                            </div>
                            <div class="flex items-center gap-3 text-sm text-slate-600">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download Instan Setelah Bayar
                            </div>
                        </div>

                       <form action="{{ route('products.buy', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-black shadow-lg hover:bg-indigo-700 transition-all active:scale-95">
                            Buy Now
                        </button>
                    </form>

                        <p class="text-center text-xs text-slate-400 mt-6">
                            Klik beli berarti kamu setuju dengan <a href="#" class="underline">Syarat & Ketentuan</a> kami.
                        </p>
                    </div>

                    {{-- Card Tambahan: Butuh Bantuan? --}}
                    <div class="mt-6 bg-slate-900 rounded-[2rem] p-6 text-white overflow-hidden relative">
                        <div class="relative z-10">
                            <h4 class="font-bold mb-2 text-lg">Butuh Bantuan?</h4>
                            <p class="text-slate-400 text-sm mb-4">Punya pertanyaan sebelum beli? Chat admin aja.</p>
                            <a href="#" class="text-sm font-bold text-indigo-400 hover:text-indigo-300 flex items-center gap-2">
                                Hubungi Support <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection