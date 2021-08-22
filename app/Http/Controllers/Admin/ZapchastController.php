<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\Zapchast;
use App\Http\Requests\ZapchastRequest;


class ZapchastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Zapchasts = Zapchast::get();
        return view('admin.zapchast.index', compact('Zapchasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Products= Product::get();
        return view('admin.zapchast.form', compact('Products'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\ZapchastRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ZapchastRequest $request)
    {
        $params = $request->validated();
        $params['code']=Catalog::translit($params['name']);
        Zapchast::create($params);
        return redirect()->route('product.index')->with('success','Запчасть  создана!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zapchast $Zapchast
     * @return \Illuminate\Http\Response
     */
    public function show(Zapchast $Zapchast)
    {
        return view('admin.zapchast.show', compact('Zapchast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zapchast $Zapchast
     * @return \Illuminate\Http\Response
     */
    public function edit(Zapchast $Zapchast)
    {
        $Products= Product::get();
        return view('admin.zapchast.form', compact('Zapchast','Products'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Models\Zapchast $Zapchast
     * @param  \App\Http\Requests\ZapchastRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ZapchastRequest $request, Zapchast $Zapchast)
    {
        $params = $request->validated();
        $params['code']=Catalog::translit($params['name']);
        $Zapchast->update($params);
        return redirect()->route('product.index')->with('success','Запчасть обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Zapchast $Zapchast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zapchast $Zapchast)
    {
        $Zapchast->delete();//удаляет выбранную компанию
        return redirect()->route('product.index')->with('success','Запчасть Удалена!');
    }
}
