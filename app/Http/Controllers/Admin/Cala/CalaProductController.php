<?php

namespace App\Http\Controllers\Admin\Cala;

use App\Common\Definition\FileDefs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cala\ProductRegisterRequest;
use App\Http\Requests\Cala\ProductSearchRequest;
use App\Models\CalaProduct;
use App\Services\Cala\Product\ProductCreator;
use App\Services\Cala\Product\ProductDelete;
use App\Services\Cala\Product\ProductEditor;
use App\Services\Cala\Product\ProductFinder;
use App\Services\Cala\Product\ProductInitialization;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CalaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(
        ProductSearchRequest $productSearchRequest,
        ProductFinder $productFinder
    ): View
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
     * @return View
     */
    public function create(
        ProductInitialization $productInitialization,
        ProductFinder $productFinder
    ): View
    {
        return view('admin.cala.products.input', [
            'product' => $productInitialization->initProduct(),
            'attrNames' => $productFinder->getAttributeNames(),
            'attrInputTypes' => $productFinder->getAttributeInputTypes(),
            'options' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(
        ProductRegisterRequest $productRegisterRequest,
        ProductCreator $productCreator
    ): RedirectResponse
    {
        $params = $productRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($productRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$productRegisterRequest->file('image')->getClientOriginalExtension();
            $productRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        $productCreator->save($params);
        return redirect()->route('admin.cala.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(
        int $productId,
        ProductFinder $productFinder
    ): View
    {
        return view('admin.cala.products.input')->with([
            'product' => $productFinder->getOne([
                'product_id' => $productId,
            ]),
            'attrNames' => $productFinder->getAttributeNames(),
            'attrInputTypes' => $productFinder->getAttributeInputTypes(),
            'options' => [],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(
        ProductRegisterRequest $productRegisterRequest,
        int $productId,
        ProductFinder $productFinder,
        ProductEditor $productEditor
    ): RedirectResponse
    {
        $product = $productFinder->getOne(['product_id' => $productId]);
        $oldImage = '';
        $params = $productRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($productRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$productRegisterRequest->file('image')->getClientOriginalExtension();
            $productRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
            $oldImage = $product->image;
        }
        $productEditor->update($product, $params);
        if ($oldImage) {
            deleteFile($oldImage);
        }
        return redirect()->route('admin.cala.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(
        int $productId,
        ProductFinder $productFinder,
        ProductDelete $productDelete
    ): RedirectResponse
    {
        $product = $productFinder->getOne(['product_id' => $productId]);
        deleteFile($product->image);
        $productDelete->destroy($product);
        return redirect()->route('admin.cala.products.index');
    }
}
