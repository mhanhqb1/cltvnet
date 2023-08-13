<?php

namespace App\Http\Controllers\Admin\Cala;

use App\Common\Definition\FileDefs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cala\TransporterRegisterRequest;
use App\Http\Requests\Cala\TransporterSearchRequest;
use App\Services\Cala\Transporter\TransporterCreator;
use App\Services\Cala\Transporter\TransporterDelete;
use App\Services\Cala\Transporter\TransporterEditor;
use App\Services\Cala\Transporter\TransporterFinder;
use App\Services\Cala\Transporter\TransporterInitialization;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CalaTransporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(
        TransporterSearchRequest $transporterSearchRequest,
        TransporterFinder $transporterFinder
    ): View
    {
        return view('admin.cala.transporters.index')->with([
            'transporters' => $transporterFinder->getPaginator($transporterSearchRequest->validated()),
            'attrNames' => $transporterFinder->getAttributeNames(),
            'options' => [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(
        TransporterInitialization $transporterInitialization,
        TransporterFinder $transporterFinder
    ): View
    {
        return view('admin.cala.transporters.input', [
            'transporter' => $transporterInitialization->initTransporter(),
            'attrNames' => $transporterFinder->getAttributeNames(),
            'attrInputTypes' => $transporterFinder->getAttributeInputTypes(),
            'options' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(
        TransporterRegisterRequest $transporterRegisterRequest,
        TransporterCreator $transporterCreator
    ): RedirectResponse
    {
        $params = $transporterRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($transporterRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$transporterRegisterRequest->file('image')->getClientOriginalExtension();
            $transporterRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        $transporterCreator->save($params);
        return redirect()->route('admin.cala.transporters.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(
        int $transporterId,
        TransporterFinder $transporterFinder
    ): View
    {
        return view('admin.cala.transporters.input')->with([
            'transporter' => $transporterFinder->getOne([
                'transporter_id' => $transporterId,
            ]),
            'attrNames' => $transporterFinder->getAttributeNames(),
            'attrInputTypes' => $transporterFinder->getAttributeInputTypes(),
            'options' => [],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(
        TransporterRegisterRequest $transporterRegisterRequest,
        int $transporterId,
        TransporterFinder $transporterFinder,
        TransporterEditor $transporterEditor
    ): RedirectResponse
    {
        $transporter = $transporterFinder->getOne(['transporter_id' => $transporterId]);
        $oldImage = '';
        $params = $transporterRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($transporterRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$transporterRegisterRequest->file('image')->getClientOriginalExtension();
            $transporterRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
            $oldImage = $transporter->image;
        }
        $transporterEditor->update($transporter, $params);
        if ($oldImage) {
            deleteFile($oldImage);
        }
        return redirect()->route('admin.cala.transporters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(
        int $transporterId,
        TransporterFinder $transporterFinder,
        TransporterDelete $transporterDelete
    ): RedirectResponse
    {
        $transporter = $transporterFinder->getOne(['transporter_id' => $transporterId]);
        deleteFile($transporter->image);
        $transporterDelete->destroy($transporter);
        return redirect()->route('admin.cala.transporters.index');
    }
}
