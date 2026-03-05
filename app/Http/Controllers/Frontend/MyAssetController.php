<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // WAJIB ADA AGAR BISA DOWNLOAD FILE

class MyAssetController extends Controller
{
    public function index()
    {
        // Sementara kita tampilkan halaman kosong yang cantik dulu
        return view('frontend.my_assets.index');
    }

    public function buy(Product $product)
    {
        $user = Auth::user();

        // Cek apakah sudah pernah beli agar tidak double
        if (!$user->purchasedProducts()->where('product_id', $product->id)->exists()) {
            $user->purchasedProducts()->attach($product->id);
        }

        return redirect()->route('my.assets')->with('success', 'Produk berhasil ditambahkan ke koleksi!');
    }

    public function download(Product $product)
    {
        // 1. Validasi: Pastikan user yang login benar-benar sudah membeli produk ini
        $hasPurchased = auth()->user()->purchasedProducts()->where('product_id', $product->id)->exists();
        
        if (!$hasPurchased) {
            return abort(403, 'Akses ditolak! Kamu belum membeli produk ini.');
        }

        // 2. Validasi: Pastikan data file_path ada di database dan file fisiknya ada di server
        if (!$product->file_path || !Storage::exists($product->file_path)) {
            return back()->with('error', 'Maaf, file produk belum tersedia atau telah dihapus oleh Admin.');
        }

        // 3. Proses Download: Kirim file ke browser user dengan format nama asli + .zip
        return Storage::download($product->file_path, $product->name . '.zip');
    }
}