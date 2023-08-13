<?php

namespace App\Http\Controllers\Admin\Cala;

use App\Common\Definition\FileDefs;
use App\Common\Definition\OrderStatus;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cala\OrderRegisterRequest;
use App\Http\Requests\Cala\OrderSearchRequest;
use App\Services\Cala\Customer\CustomerFinder;
use App\Services\Cala\Order\OrderCreator;
use App\Services\Cala\Order\OrderDelete;
use App\Services\Cala\Order\OrderEditor;
use App\Services\Cala\Order\OrderFinder;
use App\Services\Cala\Order\OrderInitialization;
use App\Services\Cala\Product\ProductFinder;
use App\Services\Cala\Transporter\TransporterFinder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CalaOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(
        OrderSearchRequest $orderSearchRequest,
        OrderFinder $orderFinder
    ): View
    {
        return view('admin.cala.orders.index')->with([
            'orders' => $orderFinder->getPaginator($orderSearchRequest->validated()),
            'attrNames' => $orderFinder->getAttributeNames(),
            'options' => [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(
        OrderInitialization $orderInitialization,
        OrderFinder $orderFinder,
        CustomerFinder $customerFinder,
        ProductFinder $productFinder
    ): View
    {
        return view('admin.cala.orders.input', [
            'order' => $orderInitialization->initOrder(),
            'attrNames' => $orderFinder->getAttributeNames(),
            'attrInputTypes' => $orderFinder->getAttributeInputTypes(),
            'options' => [
                'customer_id' => $customerFinder->getAll([], true),
                'status' => OrderStatus::i18n(),
                'product_id' => $productFinder->getAll([], true),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(
        OrderRegisterRequest $orderRegisterRequest,
        OrderCreator $orderCreator
    ): RedirectResponse
    {
        $params = $orderRegisterRequest->validated();
        $orderCreator->save($params);
        return redirect()->route('admin.cala.orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(
        int $orderId,
        OrderFinder $orderFinder,
        CustomerFinder $customerFinder,
        ProductFinder $productFinder
    ): View
    {
        return view('admin.cala.orders.input')->with([
            'order' => $orderFinder->getOne([
                'order_id' => $orderId,
            ]),
            'attrNames' => $orderFinder->getAttributeNames(),
            'attrInputTypes' => $orderFinder->getAttributeInputTypes(),
            'options' => [
                'customer_id' => $customerFinder->getAll([], true),
                'product_id' => $productFinder->getAll([], true),
                'status' => OrderStatus::i18n(),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(
        OrderRegisterRequest $orderRegisterRequest,
        int $orderId,
        OrderFinder $orderFinder,
        OrderEditor $orderEditor,
        CustomerFinder $customerFinder
    ): RedirectResponse
    {
        try {
            $order = $orderFinder->getOne(['order_id' => $orderId]);
            $params = $orderRegisterRequest->validated();
            $customer = $customerFinder->getOne([
                'customer_id' => $params['customer_id'],
            ]);
            $params['shipping_address'] = $customer->shipping_address;
            if (empty($params['shipping_time']) && !empty($customer->transporter->time_start)) {
                $params['shipping_time'] = $customer->transporter->time_start;
            }
            $orderEditor->update($order, $params);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('update_failed'));
        }
        return redirect()->route('admin.cala.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(
        int $orderId,
        OrderFinder $orderFinder,
        OrderDelete $orderDelete
    ): RedirectResponse
    {
        $order = $orderFinder->getOne(['order_id' => $orderId]);
        $orderDelete->destroy($order);
        return redirect()->route('admin.cala.orders.index');
    }
}
