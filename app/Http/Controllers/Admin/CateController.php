<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\CateType;
use App\Common\Definition\FileDefs;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateRegisterRequest;
use App\Http\Requests\CateSearchRequest;
use App\Models\Cate;
use App\Services\Cate\CateCreator;
use App\Services\Cate\CateDelete;
use App\Services\Cate\CateEditor;
use App\Services\Cate\CateFinder;
use App\Services\Cate\CateInitialization;
use Illuminate\Http\RedirectResponse;
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

    public function create(CateInitialization $cateInitialization, CateFinder $cateFinder): View
    {
        return view('admin.cates.input', [
            'cate' => $cateInitialization->initCate(),
            'attrNames' => $cateFinder->getAttributeNames(),
            'attrInputTypes' => $cateFinder->getAttributeInputTypes(),
            'options' => [
                'type' => CateType::i18n(),
            ],
        ]);
    }

    public function store(CateRegisterRequest $cateRegisterRequest, CateCreator $cateCreator): RedirectResponse
    {
        $params = $cateRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($cateRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$cateRegisterRequest->file('image')->getClientOriginalExtension();
            $cateRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        $cateCreator->save($params);
        return redirect()->route('admin.cates.index');
    }

    /**
     * @return View
     */
    public function edit(int $cateId, CateFinder $cateFinder): View
    {
        return view('admin.cates.input')->with([
            'cate' => $cateFinder->getOne([
                'cate_id' => $cateId,
            ]),
            'attrNames' => $cateFinder->getAttributeNames(),
            'attrInputTypes' => $cateFinder->getAttributeInputTypes(),
            'options' => [
                'type' => CateType::i18n(),
            ],
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function update(CateRegisterRequest $cateRegisterRequest, int $cateId, CateFinder $cateFinder, CateEditor $cateEditor): RedirectResponse
    {
        $cate = $cateFinder->getOne(['cate_id' => $cateId]);
        $oldImage = '';
        $params = $cateRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($cateRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$cateRegisterRequest->file('image')->getClientOriginalExtension();
            $cateRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
            $oldImage = $cate->image;
        }
        $cateEditor->update($cate, $params);
        if ($oldImage) {
            deleteFile($oldImage);
        }
        return redirect()->route('admin.cates.index');
    }

    public function destroy(int $cateId, CateFinder $cateFinder, CateDelete $cateDelete): RedirectResponse
    {
        $cate = $cateFinder->getOne(['cate_id' => $cateId]);
        deleteFile($cate->image);
        $cateDelete->destroy($cate);
        return redirect()->route('admin.cates.index');
    }
}
