<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\CateType;
use App\Common\Definition\FileDefs;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRegisterRequest;
use App\Http\Requests\MenuSearchRequest;
use App\Models\Menu;
use App\Services\Cate\CateFinder;
use App\Services\Food\FoodFinder;
use App\Services\Menu\MenuCreator;
use App\Services\Menu\MenuDelete;
use App\Services\Menu\MenuEditor;
use App\Services\Menu\MenuFinder;
use App\Services\Menu\MenuInitialization;
use App\Services\MenuCate\MenuCateCreator;
use App\Services\MenuCate\MenuCateDelete;
use App\Services\MenuFood\MenuFoodCreator;
use App\Services\MenuFood\MenuFoodDelete;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(
        MenuSearchRequest $menuSearchRequest,
        MenuFinder $menuFinder,
        CateFinder $cateFinder
    ): View
    {
        return view('admin.menus.index')->with([
            'menus' => $menuFinder->getPaginator($menuSearchRequest->validated()),
            'attrNames' => $menuFinder->getAttributeNames(),
            'options' => [
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Menu->value,
                ], true),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(
        MenuInitialization $menuInitialization,
        MenuFinder $menuFinder,
        CateFinder $cateFinder,
        FoodFinder $foodFinder
    ): View
    {
        return view('admin.menus.input', [
            'menu' => $menuInitialization->initMenu(),
            'attrNames' => $menuFinder->getAttributeNames(),
            'attrInputTypes' => $menuFinder->getAttributeInputTypes(),
            'options' => [
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Menu->value,
                ], true),
                'food_id' => $foodFinder->getAll([], true),
            ],
            'multi' => [
                'cate_id' => true,
                'food_id' => true,
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(
        MenuRegisterRequest $menuRegisterRequest,
        MenuCreator $menuCreator,
        MenuCateCreator $menuCateCreator,
        MenuFoodCreator $menuFoodCreator
    ): RedirectResponse
    {
        $params = $menuRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($menuRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$menuRegisterRequest->file('image')->getClientOriginalExtension();
            $menuRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        try {
            DB::beginTransaction();
            $params['detail'] = editorUploadImages($params['detail']);
            $menu = $menuCreator->save($params);
            if (!empty($params['cate_id'])) {
                foreach ($params['cate_id'] as $cateId) {
                    $menuCateCreator->save([
                        'cate_id' => $cateId,
                        'menu_id' => $menu->menu_id,
                    ]);
                }
            }
            if (!empty($params['food_id'])) {
                foreach ($params['food_id'] as $foodId) {
                    $menuFoodCreator->save([
                        'food_id' => $foodId,
                        'menu_id' => $menu->menu_id,
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('register_failed'));
        }
        return redirect()->route('admin.menus.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(
        int $menuId,
        MenuFinder $menuFinder,
        CateFinder $cateFinder,
        FoodFinder $foodFinder
    ): View
    {
        return view('admin.menus.input', [
            'menu' => $menuFinder->getOne([
                'menu_id' => $menuId,
            ]),
            'attrNames' => $menuFinder->getAttributeNames(),
            'attrInputTypes' => $menuFinder->getAttributeInputTypes(),
            'options' => [
                'cate_id' => $cateFinder->getAll([
                    'type' => CateType::Menu->value,
                ], true),
                'food_id' => $foodFinder->getAll([], true),
            ],
            'multi' => [
                'cate_id' => true,
                'food_id' => true,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(
        MenuRegisterRequest $menuRegisterRequest,
        int $menuId,
        MenuEditor $menuEditor,
        MenuFinder $menuFinder,
        MenuCateDelete $menuCateDelete,
        MenuCateCreator $menuCateCreator,
        MenuFoodDelete $menuFoodDelete,
        MenuFoodCreator $menuFoodCreator
    ): RedirectResponse
    {
        $menu = $menuFinder->getOne(['menu_id' => $menuId]);
        $params = $menuRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($menuRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$menuRegisterRequest->file('image')->getClientOriginalExtension();
            $menuRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        try {
            DB::beginTransaction();
            $params['detail'] = editorUploadImages($params['detail']);
            $menuEditor->update($menu, $params);

            $menuCateDelete->deleteByConditions([
                'menu_id' => $menuId
            ]);
            $menuFoodDelete->deleteByConditions([
                'menu_id' => $menuId
            ]);

            if (!empty($params['cate_id'])) {
                foreach ($params['cate_id'] as $cateId) {
                    $menuCateCreator->save([
                        'cate_id' => $cateId,
                        'menu_id' => $menu->menu_id,
                    ]);
                }
            }
            if (!empty($params['food_id'])) {
                foreach ($params['food_id'] as $foodId) {
                    $menuFoodCreator->save([
                        'food_id' => $foodId,
                        'menu_id' => $menu->menu_id,
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('register_failed'));
        }
        return redirect()->route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(
        int $menuId,
        MenuFinder $menuFinder,
        MenuDelete $menuDelete,
        MenuCateDelete $menuCateDelete,
        MenuFoodDelete $menuFoodDelete
    ): RedirectResponse
    {
        $menu = $menuFinder->getOne(['menu_id' => $menuId]);
        deleteFile($menu->image);
        try {
            DB::beginTransaction();
            $menuCateDelete->deleteByConditions([
                'menu_id' => $menuId
            ]);
            $menuFoodDelete->deleteByConditions([
                'menu_id' => $menuId
            ]);
            $menuDelete->destroy($menu);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('delete_failed'));
        }
        return redirect()->route('admin.menus.index');
    }
}
