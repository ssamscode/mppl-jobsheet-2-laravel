<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index()
    {
        $flashSales = FlashSale::with('product')->latest()->get();

        return view(
            'pages.admin.flashsale.index',
            compact('flashSales')
        );
    }

    public function create()
    {
        $products = Product::all();

        return view(
            'pages.admin.flashsale.create',
            compact('products')
        );
    }

    public function store(Request $request)
    {
        FlashSale::create([
            'product_id' => $request->product_id,
            'discount_price' => $request->discount_price
        ]);

        return redirect()
            ->route('admin.flashsale');
    }
}