@extends('layouts.frontend')

@section('content')
<div class="bg-[#f8fafc] min-h-screen py-20">
    <div class="max-w-7xl mx-auto px-6">
        {{-- Header Section --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-black text-slate-900 mb-4">My <span class="text-indigo-600">Assets Library</span></h1>
            <p class="text-slate-500 font-medium">Semua produk digital yang telah kamu beli ada di sini.</p>
        </div>

        {{-- Auto-Hiding Notification --}}
        @if(session('success'))
            <div id="success-alert" class="max-w-3xl mx-auto mb-10 transition-opacity duration-500">
                <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl font-bold flex items-center justify-between shadow-sm shadow-emerald-500/10">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                    <button onclick="document.getElementById('success-alert').remove()" class="text-emerald-400 hover:text-emerald-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Product Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Loop produk yang sudah dibeli oleh user --}}
            @forelse(auth()->user()->purchasedProducts as $product)
                <div class="group bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden flex flex-col">
                    {{-- Thumbnail Area --}}
                    <div class="aspect-video bg-slate-900 flex items-center justify-center relative">
                        <svg class="w-12 h-12 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="absolute top-4 right-4">
                            <span class="bg-emerald-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">
                                Purchased
                            </span>
                        </div>
                    </div>

                    {{-- Info Area --}}
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-indigo-600 transition-colors">
                            {{ $product->name }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                            {{ $product->description }}
                        </p>
                        
                        {{-- Tombol Akses Digital --}}
                        <div class="mt-auto flex gap-3">
                            <a href="{{ route('products.download', $product->id) }}" 
                                class="w-full block bg-slate-900 text-white text-center py-4 rounded-2xl font-bold hover:bg-indigo-600 transition-all">
                                    Download File
                                </a>
                            <a href="{{ route('products.show', $product->id) }}" class="w-14 h-14 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center hover:text-indigo-600 hover:bg-indigo-50 transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Tampilan jika BELUM ada produk --}}
                <div class="col-span-full bg-white rounded-[2.5rem] border border-dashed border-slate-200 p-20 text-center">
                    <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Belum ada aset digital</h3>
                    <p class="text-slate-500 mb-8">Sepertinya kamu belum melakukan pembelian apapun.</p>
                    <a href="{{ route('products.index') }}" class="inline-flex bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black shadow-lg shadow-indigo-600/20 hover:bg-indigo-700 transition-all">
                        Mulai Belanja
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

{{-- JS Auto-hide script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 4000); // 4 detik
        }
    });
</script>
@endsection