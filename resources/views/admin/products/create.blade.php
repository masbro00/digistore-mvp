@extends('backend.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6">
    {{-- Header --}}
    <div class="mb-10">
        <a href="{{ url('/admin/products') }}" class="text-indigo-600 font-bold flex items-center gap-2 mb-4 hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Catalog
        </a>
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Add New Digital Asset</h1>
        <p class="text-slate-500 mt-1">Isi detail produk digital yang ingin kamu jual.</p>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 p-8 md:p-12">
        {{-- UPDATE: Menambahkan enctype agar bisa upload file --}}
        <form action="{{ url('/admin/products') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- Product Name --}}
            <div>
                <label for="name" class="block text-sm font-bold text-slate-700 mb-3 uppercase tracking-wider">Product Name</label>
                <input type="text" name="name" id="name" required
                       class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all text-slate-900 font-medium placeholder:text-slate-400"
                       placeholder="e.g. Laravel Premium Starter Kit">
            </div>

            {{-- Price --}}
            <div>
                <label for="price" class="block text-sm font-bold text-slate-700 mb-3 uppercase tracking-wider">Price (IDR)</label>
                <div class="relative">
                    <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 font-bold">Rp</span>
                    <input type="number" name="price" id="price" required
                           class="w-full pl-14 pr-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all text-slate-900 font-medium placeholder:text-slate-400"
                           placeholder="0">
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-bold text-slate-700 mb-3 uppercase tracking-wider">Description</label>
                <textarea name="description" id="description" rows="6" required
                          class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all text-slate-900 font-medium placeholder:text-slate-400"
                          placeholder="Jelaskan fitur unggulan produk kamu..."></textarea>
            </div>

            {{-- UPDATE: Input File Produk --}}
            <div>
                <label for="product_file" class="block text-sm font-bold text-slate-700 mb-3 uppercase tracking-wider">Digital Asset File (ZIP/PDF)</label>
                <div class="relative group">
                    <input type="file" name="product_file" id="product_file" required
                           class="w-full px-6 py-4 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl group-hover:border-indigo-400 transition-all text-slate-500 font-medium cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
                <p class="text-xs text-slate-400 mt-2 font-medium">Max file size: 100MB. Format: .zip, .rar, .pdf</p>
            </div>

            {{-- Submit Button --}}
            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-slate-900 hover:bg-indigo-600 text-white py-5 rounded-2xl font-black text-lg transition-all shadow-lg shadow-slate-900/20 active:scale-[0.98]">
                    Publish Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection