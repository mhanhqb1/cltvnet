<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\CateType;
use App\Common\Definition\FileDefs;
use App\Common\Definition\Unit;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\IngredientRegisterRequest;
use App\Http\Requests\IngredientSearchRequest;
use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Services\Cate\CateFinder;
use App\Services\Ingredient\IngredientCreator;
use App\Services\Ingredient\IngredientFinder;
use App\Services\Ingredient\IngredientInitialization;
use App\Services\IngredientCate\IngredientCateCreator;
use App\Services\Nutrition\NutritionFinder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public function create(
        IngredientInitialization $ingredientInitialization,
        IngredientFinder $ingredientFinder,
        CateFinder $cateFinder,
        NutritionFinder $nutritionFinder
        ): View
    {
        return view('admin.ingredients.input', [
            'ingredient' => $ingredientInitialization->initIngredient(),
            'attrNames' => $ingredientFinder->getAttributeNames(),
            'attrInputTypes' => $ingredientFinder->getAttributeInputTypes(),
            'options' => [
                'unit' => Unit::i18n(),
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Ingredient->value,
                ], true),
                'nutrition_id' => $nutritionFinder->getAll([], true),
            ],
            'multi' => [
                'cate_id' => true,
                'nutrition_id' => true,
            ],
        ]);
    }

    public function store(
        IngredientRegisterRequest $ingredientRegisterRequest,
        IngredientCreator $ingredientCreator,
        IngredientCateCreator $ingredientCateCreator
        ): RedirectResponse
    {
        $params = $ingredientRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($ingredientRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$ingredientRegisterRequest->file('image')->getClientOriginalExtension();
            $ingredientRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        try {
            DB::beginTransaction();
            $ingredient = $ingredientCreator->save($params);
            if (!empty($params['cate_id'])) {
                foreach ($params['cate_id'] as $cateId) {
                    $ingredientCateCreator->save([
                        'cate_id' => $cateId,
                        'ingredient_id' => $ingredient->ingredient_id,
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('register_failed'));
        }
        return redirect()->route('admin.ingredients.index');
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
