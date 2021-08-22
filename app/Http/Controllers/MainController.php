<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $catalogs=Catalog::all();
        return view('catalog', compact('catalogs'));
    }
    public function product($code)
    {
        $catalog = Catalog::where('code', $code)->first();
        $products = $catalog->product()->all();
        return view('product', compact('catalog', 'products'));
    }
    public function productzap($catalog_code,$product_code)
    {
        $product = Product::where('code', $product_code)->first();
        $zapchasts = $product->zapchact()->all();
        return view('zapchast', compact('catalog_code', 'product','zapchasts'));
    }
}
