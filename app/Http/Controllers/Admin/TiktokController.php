<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\TiktokType;
use App\Http\Controllers\Controller;
use App\Http\Requests\TiktokRegisterRequest;
use App\Http\Requests\TiktokSearchRequest;
use App\Services\Tiktok\TiktokCreator;
use App\Services\Tiktok\TiktokDelete;
use App\Services\Tiktok\TiktokEditor;
use App\Services\Tiktok\TiktokFinder;
use App\Services\Tiktok\TiktokInitialization;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TiktokController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @return View
     */
    public function index(TiktokFinder $tiktokFinder, TiktokSearchRequest $tiktokSearchRequest): View
    {
        return view('admin.tiktoks.index')->with([
            'tiktoks' => $tiktokFinder->getPaginator($tiktokSearchRequest->validated()),
            'attrNames' => $tiktokFinder->getAttributeNames(),
            'options' => [
                'type' => TiktokType::i18n(),
            ],
        ]);
    }

    public function create(TiktokInitialization $tiktokInitialization, TiktokFinder $tiktokFinder): View
    {
        return view('admin.tiktoks.input', [
            'tiktok' => $tiktokInitialization->initTiktok(),
            'attrNames' => $tiktokFinder->getAttributeNames(),
            'attrInputTypes' => $tiktokFinder->getAttributeInputTypes(),
            'options' => [
                'type' => TiktokType::i18n(),
            ],
        ]);
    }

    public function store(TiktokRegisterRequest $tiktokRegisterRequest, TiktokCreator $tiktokCreator): RedirectResponse
    {
        $tiktokCreator->save($tiktokRegisterRequest->validated());
        return redirect()->route('admin.tiktoks.index');
    }

    /**
     * @return View
     */
    public function edit(int $tiktokId, TiktokFinder $tiktokFinder): View
    {
        return view('admin.tiktoks.input')->with([
            'tiktok' => $tiktokFinder->getOne([
                'id' => $tiktokId,
            ]),
            'attrNames' => $tiktokFinder->getAttributeNames(),
            'attrInputTypes' => $tiktokFinder->getAttributeInputTypes(),
            'options' => [
                'type' => TiktokType::i18n(),
            ],
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function update(TiktokRegisterRequest $tiktokRegisterRequest, int $tiktokId, TiktokFinder $tiktokFinder, TiktokEditor $tiktokEditor): RedirectResponse
    {
        $tiktok = $tiktokFinder->getOne(['id' => $tiktokId]);
        $tiktokEditor->update($tiktok, $tiktokRegisterRequest->validated());
        return redirect()->route('admin.tiktoks.index');
    }

    public function destroy(int $tiktokId, TiktokFinder $tiktokFinder, TiktokDelete $tiktokDelete): RedirectResponse
    {
        $tiktokDelete->destroy($tiktokFinder->getOne(['id' => $tiktokId]));
        return redirect()->route('admin.tiktoks.index');
    }

}
