@extends('backend.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    {{-- WELCOME HEADER --}}
    <div class="mb-10">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Overview</h1>
        <p class="text-slate-500 mt-1">Selamat datang kembali, {{ auth()->user()->name }}. Berikut ringkasan toko digitalmu hari ini.</p>
    </div>

    {{-- STATS GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <span class="text-emerald-500 text-sm font-bold bg-emerald-50 px-3 py-1 rounded-full">+12%</span>
            </div>
            <div class="text-slate-500 text-sm font-medium uppercase tracking-wider">Total Products</div>
            <div class="text-4xl font-black text-slate-900 mt-1">{{ $productsCount ?? '0' }}</div>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="text-slate-400 text-sm font-medium italic underline">Simulasi</span>
            </div>
            <div class="text-slate-500 text-sm font-medium uppercase tracking-wider">Total Revenue</div>
            <div class="text-4xl font-black text-slate-900 mt-1">Rp 2.4M</div>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
                <span class="text-slate-400 text-sm font-medium">Pending: 3</span>
            </div>
            <div class="text-slate-500 text-sm font-medium uppercase tracking-wider">Total Orders</div>
            <div class="text-4xl font-black text-slate-900 mt-1">48</div>
        </div>
    </div>

    {{-- RECENT ACTIVITIES & QUICK LINKS --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- QUICK LINKS --}}
        <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white relative overflow-hidden">
            <div class="relative z-10">
                <h3 class="text-2xl font-bold mb-6">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="/admin/products/create" class="p-6 bg-white/10 hover:bg-white/20 rounded-3xl border border-white/10 transition-all group">
                        <div class="w-10 h-10 bg-indigo-500 rounded-xl mb-4 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <span class="font-bold block">Add Product</span>
                        <span class="text-xs text-slate-400">Upload asset baru</span>
                    </a>
                    <a href="/" target="_blank" class="p-6 bg-white/10 hover:bg-white/20 rounded-3xl border border-white/10 transition-all group">
                        <div class="w-10 h-10 bg-emerald-500 rounded-xl mb-4 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <span class="font-bold block">View Store</span>
                        <span class="text-xs text-slate-400">Lihat tampilan depan</span>
                    </a>
                </div>
            </div>
            {{-- Decorative Pattern --}}
            <div class="absolute right-0 bottom-0 opacity-10">
                <svg width="200" height="200" fill="currentColor"><circle cx="100" cy="100" r="80" /></svg>
            </div>
        </div>

        {{-- INFO PRODUCT TERBARU --}}
        <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm">
            <h3 class="text-2xl font-bold text-slate-900 mb-6 text-center">Info</h3>
            <div class="flex flex-col items-center justify-center h-full text-center pb-10">
                <p class="text-slate-500 leading-relaxed mb-6">
                    Mulai masukkan produk eBook atau Source Code milikmu. Kamu bisa mengelola harga dan deskripsi kapan saja.
                </p>
                <a href="/admin/products" class="text-indigo-600 font-bold hover:underline">Kelola Katalog Produk →</a>
            </div>
        </div>
    </div>
</div>
@endsection