<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateSearchRequest;
use App\Models\Cate;
use App\Http\Requests\StoreCateRequest;
use App\Http\Requests\UpdateCateRequest;
use App\Services\Cate\CateFinder;
use Illuminate\View\View;

class CateController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @return View
     */
    public function index(CateFinder $cateFinder, CateSearchRequest $cateSearchRequest): View
    {
        return view('admin.cates.index')->with([
            'cates' => $cateFinder->getPaginator($cateSearchRequest->validated()),
            'attrNames' => $cateFinder->getAttributeNames(),
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
     * @param  \App\Http\Requests\StoreCateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCateRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function edit(Cate $cate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCateRequest  $request
     * @param  \App\Models\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCateRequest $request, Cate $cate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cate $cate)
    {
        //
    }
}
