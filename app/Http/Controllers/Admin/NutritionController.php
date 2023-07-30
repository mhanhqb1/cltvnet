<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\FileDefs;
use App\Http\Controllers\Controller;
use App\Http\Requests\NutritionRegisterRequest;
use App\Http\Requests\NutritionSearchRequest;
use App\Services\Nutrition\NutritionCreator;
use App\Services\Nutrition\NutritionDelete;
use App\Services\Nutrition\NutritionEditor;
use App\Services\Nutrition\NutritionFinder;
use App\Services\Nutrition\NutritionInitialization;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NutritionController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @return View
     */
    public function index(NutritionFinder $nutritionFinder, NutritionSearchRequest $nutritionSearchRequest): View
    {
        return view('admin.nutritions.index')->with([
            'nutritions' => $nutritionFinder->getPaginator($nutritionSearchRequest->validated()),
            'attrNames' => $nutritionFinder->getAttributeNames(),
        ]);
    }

    /**
     * @return View
     */
    public function edit(int $nutritionId, NutritionFinder $nutritionFinder): View
    {
        return view('admin.nutritions.input')->with([
            'nutrition' => $nutritionFinder->getOne([
                'nutrition_id' => $nutritionId,
            ]),
            'attrNames' => $nutritionFinder->getAttributeNames(),
            'attrInputTypes' => $nutritionFinder->getAttributeInputTypes(),
        ]);
    }

    public function create(NutritionInitialization $nutritionInitialization, NutritionFinder $nutritionFinder): View
    {
        return view('admin.nutritions.input', [
            'nutrition' => $nutritionInitialization->initNutrition(),
            'attrNames' => $nutritionFinder->getAttributeNames(),
            'attrInputTypes' => $nutritionFinder->getAttributeInputTypes(),
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function update(NutritionRegisterRequest $nutritionRegisterRequest, int $nutritionId, NutritionFinder $nutritionFinder, NutritionEditor $nutritionEditor): RedirectResponse
    {
        $nutrition = $nutritionFinder->getOne(['nutrition_id' => $nutritionId]);
        $oldImage = '';
        $params = $nutritionRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($nutritionRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$nutritionRegisterRequest->file('image')->getClientOriginalExtension();
            $nutritionRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
            $oldImage = $nutrition->image;
        }
        $nutritionEditor->update($nutrition, $params);
        if ($oldImage) {
            deleteFile($oldImage);
        }
        return redirect()->route('admin.nutritions.index');
    }

    public function store(NutritionRegisterRequest $nutritionRegisterRequest, NutritionCreator $nutritionCreator): RedirectResponse
    {
        $params = $nutritionRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($nutritionRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$nutritionRegisterRequest->file('image')->getClientOriginalExtension();
            $nutritionRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        $nutritionCreator->save($params);
        return redirect()->route('admin.nutritions.index');
    }

    public function destroy(int $nutritionId, NutritionFinder $nutritionFinder, NutritionDelete $nutritionDelete): RedirectResponse
    {
        $nutrition = $nutritionFinder->getOne(['nutrition_id' => $nutritionId]);
        deleteFile($nutrition->image);
        $nutritionDelete->destroy($nutrition);

        return redirect()->route('admin.nutritions.index');
    }
}
