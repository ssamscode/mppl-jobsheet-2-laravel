<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::latest()->get();

    confirmDelete(
        'Hapus Data!',
        'Apakah anda yakin ingin menghapus data ini?'
    );

    return view(
        'pages.admin.product.index',
        compact('products')
    );
}

    public function create()
    {
        return view('pages.admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $image = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('images'),
            $image
        );

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect()
            ->route('admin.product')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.admin.product.detail', compact('product'));
    }

    public function edit($id)
{
    $product = Product::findOrFail($id);

    return view('pages.admin.product.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    if ($request->hasFile('image')) {

        $image = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('images'),
            $image
        );

        $product->image = $image;
    }

    $product->name = $request->name;
    $product->price = $request->price;
    $product->category = $request->category;
    $product->description = $request->description;

    $product->save();

    return redirect()
        ->route('admin.product')
        ->with('success', 'Produk berhasil diupdate');
}

public function delete($id)
{
    $product = Product::findOrFail($id);

    $product->delete();

    return redirect()
        ->route('admin.product')
        ->with('success', 'Produk berhasil dihapus');
}

}