<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Http\Requests\CatalogRequest;


class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Catalogs= Catalog::get();
        return view('admin.catalog.index', compact('Catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CatalogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogRequest $request)
    {
        $params = $request->validated();
        $params['code']=Catalog::translit($params['name']);
        Catalog::create($params);
        return redirect()->route('catalog.index')->with('success','Каталог создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Catalog $Catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $Catalog)
    {
        return view('admin.catalog.show', compact('Catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog $Catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $Catalog)
    {
        return view('admin.catalog.form',compact('Catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CatalogRequest  $request
     * @param  \App\Models\Catalog $Catalog
     * @return \Illuminate\Http\Response
     */
    public function update(CatalogRequest $request, Catalog $Catalog)
    {
        $params = $request->validated();
        $params['code']=Catalog::translit($params['name']);
        $Catalog->update($params);
        return redirect()->route('catalog.index')->with('success','Каталог обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Catalog $Catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $Catalog)
    {
        $Catalog->delete();
        return redirect()->route('catalog.index')->with('success','Каталог удален!');
    }
}
