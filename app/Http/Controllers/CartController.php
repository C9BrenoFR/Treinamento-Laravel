<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartProducts = Product::all();
        return view('cart', compact('cartProducts'));
    }

    public function purchaseError()
    {
        return view('purchase_error');
    }
}
