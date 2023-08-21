<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        //get product with galleries and category where deleted_at null
        $products = Product::with(['galleries', 'category'])->where('status', '1')->get();

        // dd($products);
        return view('index', compact('products'));
    }
}
