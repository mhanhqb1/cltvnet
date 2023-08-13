<?php

namespace App\Http\Controllers\Cala;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cala\ProductSearchRequest;
use App\Models\CalaProduct;
use App\Services\Cala\Product\ProductFinder;

class CalaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        ProductSearchRequest $productSearchRequest,
        ProductFinder $productFinder
    )
    {
        return view('admin.cala.products.index')->with([
            'products' => $productFinder->getPaginator($productSearchRequest->validated()),
            'attrNames' => $productFinder->getAttributeNames(),
            'options' => [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalaProduct  $calaProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CalaProduct $calaProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalaProduct  $calaProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CalaProduct $calaProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $productId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $productId)
    {
        //
    }
}
