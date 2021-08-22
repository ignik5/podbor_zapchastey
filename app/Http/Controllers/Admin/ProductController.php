<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\Zapchast;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::get();
        return view('admin.product.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Catalogs= Catalog::get();
        return view('admin.product.form', compact('Catalogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $params = $request->validated();
        $params['code']=Catalog::translit($params['name']);
        Product::create($params);
        return redirect()->route('product.index')->with('success','Товар создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Product $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
        $Zapchasts = $Product->zapchact()->all();
        return view('admin.product.show', compact('Product','Zapchasts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Product $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product)
    {
        $Catalogs= Catalog::get();
        return view('admin.product.form', compact('Catalogs','Product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  App\Models\Product $Product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $Product)
    {
        $params = $request->validated();
        $params['code']=Catalog::translit($params['name']);
        $Product->update($params);
        return redirect()->route('product.index')->with('success','Товар обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  App\Models\Product $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        $Product->delete();
        return redirect()->route('product.index')->with('success','Товар Удален!');
    }
}
