<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'product_file' => 'nullable|file|mimes:zip,rar,pdf|max:102400', // Tambahkan validasi file
        ]);

        $product = new Product($request->only('name', 'description', 'price'));

        if ($request->hasFile('product_file')) {
            // Simpan file di folder private agar aman
            $path = $request->file('product_file')->store('private/products');
            $product->file_path = $path;
        }

        $product->save();

        return redirect('/admin/products')->with('success', 'Product created successfully with asset.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'product_file' => 'nullable|file|mimes:zip,rar,pdf|max:102400',
        ]);

        $product->fill($request->only('name', 'description', 'price'));

        if ($request->hasFile('product_file')) {
            $path = $request->file('product_file')->store('private/products');
            $product->file_path = $path;
        }

        $product->save();

        return redirect('/admin/products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/products')->with('success', 'Product deleted successfully.');
    }
}