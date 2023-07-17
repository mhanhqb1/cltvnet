<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NutritionSearchRequest;
use App\Services\Nutrition\NutritionFinder;
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
            'attrNames' => $nutritionFinder->getAttributeNames()
        ]);
    }
}
