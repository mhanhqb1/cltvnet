<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\CateType;
use App\Common\Definition\FileDefs;
use App\Common\Definition\Unit;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\IngredientRegisterRequest;
use App\Http\Requests\IngredientSearchRequest;
use App\Services\Cate\CateFinder;
use App\Services\Ingredient\IngredientCreator;
use App\Services\Ingredient\IngredientDelete;
use App\Services\Ingredient\IngredientEditor;
use App\Services\Ingredient\IngredientFinder;
use App\Services\Ingredient\IngredientInitialization;
use App\Services\IngredientCate\IngredientCateCreator;
use App\Services\IngredientCate\IngredientCateDelete;
use App\Services\IngredientNutrition\IngredientNutritionCreator;
use App\Services\IngredientNutrition\IngredientNutritionDelete;
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
        IngredientCateCreator $ingredientCateCreator,
        IngredientNutritionCreator $ingredientNutritionCreator
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
            $params['detail'] = editorUploadImages($params['detail']);
            $ingredient = $ingredientCreator->save($params);
            if (!empty($params['cate_id'])) {
                foreach ($params['cate_id'] as $cateId) {
                    $ingredientCateCreator->save([
                        'cate_id' => $cateId,
                        'ingredient_id' => $ingredient->ingredient_id,
                    ]);
                }
            }
            if (!empty($params['nutrition_id'])) {
                foreach ($params['nutrition_id'] as $nutritionId) {
                    $ingredientNutritionCreator->save([
                        'nutrition_id' => $nutritionId,
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

    public function edit(
        int $ingredientId,
        IngredientFinder $ingredientFinder,
        CateFinder $cateFinder,
        NutritionFinder $nutritionFinder
    ): View
    {
        return view('admin.ingredients.input', [
            'ingredient' => $ingredientFinder->getOne([
                'ingredient_id' => $ingredientId,
            ]),
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

    public function update(
        IngredientRegisterRequest $ingredientRegisterRequest,
        int $ingredientId,
        IngredientFinder $ingredientFinder,
        IngredientEditor $ingredientEditor,
        IngredientCateCreator $ingredientCateCreator,
        IngredientNutritionCreator $ingredientNutritionCreator,
        IngredientCateDelete $ingredientCateDelete,
        IngredientNutritionDelete $ingredientNutritionDelete
    )
    {
        $ingredient = $ingredientFinder->getOne(['ingredient_id' => $ingredientId]);
        $params = $ingredientRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($ingredientRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$ingredientRegisterRequest->file('image')->getClientOriginalExtension();
            $ingredientRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        try {
            DB::beginTransaction();
            $params['detail'] = editorUploadImages($params['detail']);
            $ingredientEditor->update($ingredient, $params);

            $ingredientCateDelete->deleteByConditions([
                'ingredient_id' => $ingredientId
            ]);
            $ingredientNutritionDelete->deleteByConditions([
                'ingredient_id' => $ingredientId
            ]);

            if (!empty($params['cate_id'])) {
                foreach ($params['cate_id'] as $cateId) {
                    $ingredientCateCreator->save([
                        'cate_id' => $cateId,
                        'ingredient_id' => $ingredient->ingredient_id,
                    ]);
                }
            }
            if (!empty($params['nutrition_id'])) {
                foreach ($params['nutrition_id'] as $nutritionId) {
                    $ingredientNutritionCreator->save([
                        'nutrition_id' => $nutritionId,
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

    public function destroy(
        int $ingredientId,
        IngredientFinder $ingredientFinder,
        IngredientDelete $ingredientDelete,
        IngredientCateDelete $ingredientCateDelete,
        IngredientNutritionDelete $ingredientNutritionDelete)
    {
        $ingredient = $ingredientFinder->getOne(['ingredient_id' => $ingredientId]);
        deleteFile($ingredient->image);
        try {
            DB::beginTransaction();
            $ingredientCateDelete->deleteByConditions([
                'ingredient_id' => $ingredientId
            ]);
            $ingredientNutritionDelete->deleteByConditions([
                'ingredient_id' => $ingredientId
            ]);
            $ingredientDelete->destroy($ingredient);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('delete_failed'));
        }
        return redirect()->route('admin.ingredients.index');
    }
}
