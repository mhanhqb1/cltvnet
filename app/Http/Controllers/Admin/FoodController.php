<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\CateType;
use App\Common\Definition\FileDefs;
use App\Common\Definition\FoodType;
use App\Common\Definition\Level;
use App\Common\Definition\MealType;
use App\Common\Definition\RecipeType;
use App\Common\Definition\VideoType;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRegisterRequest;
use App\Http\Requests\FoodSearchRequest;
use App\Services\Cate\CateFinder;
use App\Services\Food\FoodCreator;
use App\Services\Food\FoodDelete;
use App\Services\Food\FoodEditor;
use App\Services\Food\FoodFinder;
use App\Services\Food\FoodInitialization;
use App\Services\FoodCate\FoodCateCreator;
use App\Services\FoodCate\FoodCateDelete;
use App\Services\FoodMealType\FoodMealTypeCreator;
use App\Services\FoodMealType\FoodMealTypeDelete;
use App\Services\FoodRecipe\FoodRecipeCreator;
use App\Services\FoodRecipe\FoodRecipeDelete;
use App\Services\FoodRecipe\FoodRecipeFinder;
use App\Services\FoodVideo\FoodVideoCreator;
use App\Services\FoodVideo\FoodVideoDelete;
use App\Services\FoodVideo\FoodVideoFinder;
use App\Services\Ingredient\IngredientFinder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class FoodController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Show list
     *
     * @param FoodSearchRequest $foodSearchRequest
     * @param FoodFinder $foodFinder
     * @param CateFinder $cateFinder
     * @return View
     */
    public function index(
        FoodSearchRequest $foodSearchRequest,
        FoodFinder $foodFinder,
        CateFinder $cateFinder
    ): View
    {
        return view('admin.foods.index')->with([
            'foods' => $foodFinder->getPaginator($foodSearchRequest->validated()),
            'attrNames' => $foodFinder->getAttributeNames(),
            'options' => [
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Food->value,
                ], true),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FoodInitialization $foodInitialization
     * @param FoodFinder $foodFinder
     * @param CateFinder $cateFinder
     * @param FoodRecipeFinder $foodRecipeFinder
     * @param IngredientFinder $ingredientFinder
     * @param FoodVideoFinder $foodVideoFinder
     * @return View
     */
    public function create(
        FoodInitialization $foodInitialization,
        FoodFinder $foodFinder,
        CateFinder $cateFinder,
        FoodRecipeFinder $foodRecipeFinder,
        IngredientFinder $ingredientFinder,
        FoodVideoFinder $foodVideoFinder
    ): View
    {
        return view('admin.foods.input', [
            'food' => $foodInitialization->initFood(),
            'attrNames' => $foodFinder->getAttributeNames(),
            'attrInputTypes' => $foodFinder->getAttributeInputTypes(),
            'recipeAttrNames' => $foodRecipeFinder->getAttributeNames(),
            'recipeAttrInputTypes' => $foodRecipeFinder->getAttributeInputTypes(),
            'videoAttrNames' => $foodVideoFinder->getAttributeNames(),
            'videoAttrInputTypes' => $foodVideoFinder->getAttributeInputTypes(),
            'options' => [
                'type' => FoodType::i18n(),
                'level' => Level::i18n(),
                'meal_type' => MealType::i18n(),
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Food->value,
                ], true),
            ],
            'recipeOptions' => [
                'recipe_type' => RecipeType::i18n(),
                'ingredient_id' => array_merge([
                        '' => ''
                    ],
                    $ingredientFinder->getAll([], true)
                ),
            ],
            'videoOptions' => [
                'video_type' => VideoType::i18n(),
            ],
            'multi' => [
                'cate_id' => true,
                'meal_type' => true,
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FoodRegisterRequest $foodRegisterRequest
     * @param FoodCreator $foodCreator
     * @param FoodCateCreator $foodCateCreator
     * @param FoodRecipeCreator $foodRecipeCreator
     * @param FoodMealTypeCreator $foodMealTypeCreator
     * @param FoodVideoCreator $foodVideoCreator
     * @return RedirectResponse
     */
    public function store(
        FoodRegisterRequest $foodRegisterRequest,
        FoodCreator $foodCreator,
        FoodCateCreator $foodCateCreator,
        FoodRecipeCreator $foodRecipeCreator,
        FoodMealTypeCreator $foodMealTypeCreator,
        FoodVideoCreator $foodVideoCreator
    ): RedirectResponse
    {
        $params = $foodRegisterRequest->multiValidated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($foodRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$foodRegisterRequest->file('image')->getClientOriginalExtension();
            $foodRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        try {
            DB::beginTransaction();
            $params['detail'] = editorUploadImages($params['detail']);
            $food = $foodCreator->save($params);
            if (!empty($params['cate_id'])) {
                foreach ($params['cate_id'] as $cateId) {
                    $foodCateCreator->save([
                        'cate_id' => $cateId,
                        'food_id' => $food->food_id,
                    ]);
                }
            }
            if (!empty($params['meal_type'])) {
                foreach ($params['meal_type'] as $mealType) {
                    $foodMealTypeCreator->save([
                        'meal_type' => $mealType,
                        'food_id' => $food->food_id,
                    ]);
                }
            }
            if (!empty($params['food_recipes'])) {
                foreach ($params['food_recipes'] as $foodRecipe) {
                    $foodRecipe['food_id'] = $food->food_id;
                    $foodRecipeCreator->save($foodRecipe);
                }
            }
            if (!empty($params['food_videos'])) {
                foreach ($params['food_videos'] as $foodVideo) {
                    $foodVideo['food_id'] = $food->food_id;
                    $foodVideoCreator->save($foodVideo);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('register_failed'));
        }
        return redirect()->route('admin.foods.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $foodId
     * @param FoodFinder $foodFinder
     * @param CateFinder $cateFinder
     * @return View
     */
    public function edit(
        int $foodId,
        FoodFinder $foodFinder,
        CateFinder $cateFinder,
        FoodRecipeFinder $foodRecipeFinder,
        IngredientFinder $ingredientFinder,
        FoodVideoFinder $foodVideoFinder
    ): View
    {
        return view('admin.foods.input', [
            'food' => $foodFinder->getOne([
                'food_id' => $foodId,
            ]),
            'attrNames' => $foodFinder->getAttributeNames(),
            'attrInputTypes' => $foodFinder->getAttributeInputTypes(),
            'recipeAttrNames' => $foodRecipeFinder->getAttributeNames(),
            'recipeAttrInputTypes' => $foodRecipeFinder->getAttributeInputTypes(),
            'videoAttrNames' => $foodVideoFinder->getAttributeNames(),
            'videoAttrInputTypes' => $foodVideoFinder->getAttributeInputTypes(),
            'options' => [
                'type' => FoodType::i18n(),
                'level' => Level::i18n(),
                'meal_type' => MealType::i18n(),
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Food->value,
                ], true),
            ],
            'recipeOptions' => [
                'recipe_type' => RecipeType::i18n(),
                'ingredient_id' => array_merge([
                        '' => ''
                    ], $ingredientFinder->getAll([], true)
                ),
            ],
            'videoOptions' => [
                'video_type' => VideoType::i18n(),
            ],
            'multi' => [
                'cate_id' => true,
                'meal_type' => true,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FoodRegisterRequest $foodRegisterRequest
     * @param int $foodId
     * @param FoodEditor $foodEditor
     * @param FoodFinder $foodFinder
     * @param FoodCateDelete $foodCateDelete
     * @param FoodCateCreator $foodCateCreator
     * @param FoodRecipeDelete $foodRecipeDelete
     * @param FoodRecipeCreator $foodRecipeCreator
     * @param FoodMealTypeDelete $foodMealTypeDelete
     * @param FoodMealTypeCreator $foodMealTypeCreator
     * @param FoodVideoDelete $foodVideoDelete
     * @param FoodVideoCreator $foodVideoCreator
     * @return RedirectResponse
     */
    public function update(
        FoodRegisterRequest $foodRegisterRequest,
        int $foodId,
        FoodEditor $foodEditor,
        FoodFinder $foodFinder,
        FoodCateDelete $foodCateDelete,
        FoodCateCreator $foodCateCreator,
        FoodRecipeDelete $foodRecipeDelete,
        FoodRecipeCreator $foodRecipeCreator,
        FoodMealTypeDelete $foodMealTypeDelete,
        FoodMealTypeCreator $foodMealTypeCreator,
        FoodVideoDelete $foodVideoDelete,
        FoodVideoCreator $foodVideoCreator
    ): RedirectResponse
    {
        $food = $foodFinder->getOne(['food_id' => $foodId]);
        $params = $foodRegisterRequest->multiValidated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($foodRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$foodRegisterRequest->file('image')->getClientOriginalExtension();
            $foodRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        try {
            DB::beginTransaction();
            $params['detail'] = editorUploadImages($params['detail']);
            $foodEditor->update($food, $params);

            $foodCateDelete->deleteByConditions([
                'food_id' => $foodId
            ]);
            $foodRecipeDelete->deleteByConditions([
                'food_id' => $foodId
            ]);
            $foodMealTypeDelete->deleteByConditions([
                'food_id' => $foodId
            ]);
            $foodVideoDelete->deleteByConditions([
                'food_id' => $foodId
            ]);

            if (!empty($params['cate_id'])) {
                foreach ($params['cate_id'] as $cateId) {
                    $foodCateCreator->save([
                        'cate_id' => $cateId,
                        'food_id' => $food->food_id,
                    ]);
                }
            }
            if (!empty($params['meal_type'])) {
                foreach ($params['meal_type'] as $mealType) {
                    $foodMealTypeCreator->save([
                        'meal_type' => $mealType,
                        'food_id' => $food->food_id,
                    ]);
                }
            }
            if (!empty($params['food_recipes'])) {
                foreach ($params['food_recipes'] as $foodRecipe) {
                    $foodRecipe['food_id'] = $food->food_id;
                    $foodRecipeCreator->save($foodRecipe);
                }
            }
            if (!empty($params['food_videos'])) {
                foreach ($params['food_videos'] as $foodVideo) {
                    $foodVideo['food_id'] = $food->food_id;
                    $foodVideoCreator->save($foodVideo);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('register_failed'));
        }
        return redirect()->route('admin.foods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $foodId
     * @param FoodFinder $foodFinder
     * @param FoodDelete $foodDelete
     * @param FoodCateDelete $foodCateDelete
     * @return RedirectResponse
     */
    public function destroy(
        int $foodId,
        FoodFinder $foodFinder,
        FoodDelete $foodDelete,
        FoodCateDelete $foodCateDelete
    ): RedirectResponse
    {
        $food = $foodFinder->getOne(['food_id' => $foodId]);
        deleteFile($food->image);
        try {
            DB::beginTransaction();
            $foodCateDelete->deleteByConditions([
                'food_id' => $foodId
            ]);
            $foodDelete->destroy($food);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('delete_failed'));
        }
        return redirect()->route('admin.foods.index');
    }
}
