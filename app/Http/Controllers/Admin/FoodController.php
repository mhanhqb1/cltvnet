<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\CateType;
use App\Common\Definition\FileDefs;
use App\Common\Definition\FoodType;
use App\Common\Definition\Level;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRegisterRequest;
use App\Http\Requests\FoodSearchRequest;
use App\Services\Cate\CateFinder;
use App\Services\Food\FoodCreator;
use App\Services\Food\FoodFinder;
use App\Services\Food\FoodInitialization;
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
     * @return View
     */
    public function create(
        FoodInitialization $foodInitialization,
        FoodFinder $foodFinder,
        CateFinder $cateFinder
    ): View
    {
        return view('admin.foods.input', [
            'food' => $foodInitialization->initFood(),
            'attrNames' => $foodFinder->getAttributeNames(),
            'attrInputTypes' => $foodFinder->getAttributeInputTypes(),
            'options' => [
                'type' => FoodType::i18n(),
                'level' => Level::i18n(),
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Food->value,
                ], true),
            ],
            'multi' => [
                'cate_id' => true,
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FoodRegisterRequest $foodRegisterRequest
     * @param FoodCreator $foodCreator
     * @return RedirectResponse
     */
    public function store(
        FoodRegisterRequest $foodRegisterRequest,
        FoodCreator $foodCreator
    ): RedirectResponse
    {
        $params = $foodRegisterRequest->validated();
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
     * @return \Illuminate\Http\Response
     */
    public function edit(int $foodId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $foodId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $foodId)
    {
        //
    }
}
