@extends('layouts.frontend')

@section('content')
<div class="bg-[#f8fafc] min-h-screen">
    {{-- Header Section --}}
    <div class="bg-slate-900 pt-20 pb-32 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4 tracking-tight">
                Our <span class="text-indigo-400">Digital Assets</span>
            </h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">
                Koleksi premium untuk mendukung proyek development kamu lebih cepat dan efisien.
            </p>
        </div>
    </div>

    {{-- Grid Produk --}}
    <div class="max-w-7xl mx-auto px-6 -mt-16 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
                <div class="group bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-indigo-500/10 transition-all duration-500 overflow-hidden flex flex-col">
                    
                    {{-- Visual Area --}}
                    <div class="aspect-video bg-slate-100 flex items-center justify-center relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent"></div>
                        <svg class="w-16 h-16 text-slate-200 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>

                    {{-- Data Area --}}
                    <div class="p-8 flex flex-col flex-1">
                        <h2 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">
                            {{ $product->name }}
                        </h2>

                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2">
                            {{ Str::limit($product->description, 80) }}
                        </p>

                        <div class="mt-auto flex items-center justify-between">
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block text-[10px]">Price</span>
                                <p class="font-black text-2xl text-slate-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <a href="{{ route('products.show', $product->id) }}" 
                               class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center hover:bg-indigo-600 transition-all shadow-lg active:scale-95">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection