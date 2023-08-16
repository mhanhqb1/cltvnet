<?php

namespace App\Http\Controllers\Admin\Cala;

use App\Common\Definition\FileDefs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cala\CostOrderRegisterRequest;
use App\Http\Requests\Cala\CostOrderSearchRequest;
use App\Services\Cala\CostOrder\CostOrderCreator;
use App\Services\Cala\CostOrder\CostOrderDelete;
use App\Services\Cala\CostOrder\CostOrderEditor;
use App\Services\Cala\CostOrder\CostOrderFinder;
use App\Services\Cala\CostOrder\CostOrderInitialization;
use App\Services\Cala\Transporter\TransporterFinder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CalaCostOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(
        CostOrderSearchRequest $costOrderSearchRequest,
        CostOrderFinder $costOrderFinder
    ): View
    {
        return view('admin.cala.cost-orders.index')->with([
            'costOrders' => $costOrderFinder->getPaginator($costOrderSearchRequest->validated()),
            'attrNames' => $costOrderFinder->getAttributeNames(),
            'options' => [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(
        CostOrderInitialization $costOrderInitialization,
        CostOrderFinder $costOrderFinder
    ): View
    {
        return view('admin.cala.cost-orders.input', [
            'costOrder' => $costOrderInitialization->initCostOrder(),
            'attrNames' => $costOrderFinder->getAttributeNames(),
            'attrInputTypes' => $costOrderFinder->getAttributeInputTypes(),
            'options' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(
        CostOrderRegisterRequest $costOrderRegisterRequest,
        CostOrderCreator $costOrderCreator
    ): RedirectResponse
    {
        $params = $costOrderRegisterRequest->validated();
        $costOrderCreator->save($params);
        return redirect()->route('admin.cala.cost_orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(
        int $costOrderId,
        CostOrderFinder $costOrderFinder
    ): View
    {
        return view('admin.cala.cost-orders.input')->with([
            'costOrder' => $costOrderFinder->getOne([
                'cost_order_id' => $costOrderId,
            ]),
            'attrNames' => $costOrderFinder->getAttributeNames(),
            'attrInputTypes' => $costOrderFinder->getAttributeInputTypes(),
            'options' => [],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(
        CostOrderRegisterRequest $costOrderRegisterRequest,
        int $costOrderId,
        CostOrderFinder $costOrderFinder,
        CostOrderEditor $costOrderEditor
    ): RedirectResponse
    {
        $costOrder = $costOrderFinder->getOne(['cost_order_id' => $costOrderId]);
        $params = $costOrderRegisterRequest->validated();
        $costOrderEditor->update($costOrder, $params);
        return redirect()->route('admin.cala.cost_orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(
        int $costOrderId,
        CostOrderFinder $costOrderFinder,
        CostOrderDelete $costOrderDelete
    ): RedirectResponse
    {
        $costOrder = $costOrderFinder->getOne(['cost_order_id' => $costOrderId]);
        $costOrderDelete->destroy($costOrder);
        return redirect()->route('admin.cala.cost_orders.index');
    }
}
