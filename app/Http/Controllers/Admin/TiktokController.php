<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\TiktokType;
use App\Http\Controllers\Controller;
use App\Services\Tiktok\TiktokFinder;
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
    public function index(TiktokFinder $tiktokFinder): View
    {
        return view('admin.tiktoks.index')->with([
            'tiktoks' => $tiktokFinder->getPaginator([]),
            'attrNames' => $tiktokFinder->getAttributeNames(),
            'options' => [
                'type' => TiktokType::i18n(),
            ],
        ]);
    }

    public function create(): View
    {
        return view('admin.tiktoks.input');
    }

    public function store(): RedirectResponse
    {
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
    public function update(int $tiktokId): RedirectResponse
    {
        return redirect()->route('admin.tiktoks.index');
    }

    public function destroy(int $tiktokId): RedirectResponse
    {
        return redirect()->route('admin.tiktoks.index');
    }

}
