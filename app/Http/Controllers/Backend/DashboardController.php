<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah produk untuk ditampilkan di stats card
        $productsCount = Product::count();
        
        return view('admin.dashboard', compact('productsCount'));
    }
}