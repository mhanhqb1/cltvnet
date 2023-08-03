<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\CateType;
use App\Common\Definition\Unit;
use App\Http\Controllers\Controller;
use App\Http\Requests\IngredientSearchRequest;
use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Services\Cate\CateFinder;
use App\Services\Ingredient\IngredientFinder;
use Illuminate\View\View;

class IngredientController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @return View
     */
    public function index(
        IngredientFinder $ingredientFinder,
        IngredientSearchRequest $ingredientSearchRequest,
        CateFinder $cateFinder
        ): View
    {
        return view('admin.ingredients.index')->with([
            'ingredients' => $ingredientFinder->getPaginator($ingredientSearchRequest->validated()),
            'attrNames' => $ingredientFinder->getAttributeNames(),
            'options' => [
                'unit' => Unit::i18n(),
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Ingredient->value,
                ], true),
            ],
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
     * @param  \App\Http\Requests\StoreIngredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngredientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIngredientRequest  $request
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
