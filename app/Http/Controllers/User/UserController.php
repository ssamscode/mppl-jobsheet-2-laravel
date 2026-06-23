<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('pages.user.index', compact('products'));
    }
}