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
use App\Services\Cala\OrderProduct\OrderProductCreator;
use App\Services\Cala\OrderProduct\OrderProductDelete;
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
        CustomerFinder $customerFinder,
        OrderFinder $orderFinder
    ): View
    {
        return view('admin.cala.orders.index')->with([
            'orders' => $orderFinder->getPaginator($orderSearchRequest->validated()),
            'attrNames' => $orderFinder->getAttributeNames(),
            'options' => [
                'customer_id' => $customerFinder->getAll([], true),
                'status' => OrderStatus::i18n(),
            ],
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
            'multi' => [
                'product_id' => true,
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
        OrderCreator $orderCreator,
        OrderEditor $orderEditor,
        CustomerFinder $customerFinder,
        ProductFinder $productFinder,
        OrderProductCreator $orderProductCreator
    ): RedirectResponse
    {
        $params = $orderRegisterRequest->validated();
        $params['order_date'] = $params['order_date'] ?? date('Y-m-d');
        $params['status'] = $params['status'] ?? OrderStatus::Pending->value;
        $params['ship_cost'] = $params['ship_cost'] ?? 0;
        $customer = $customerFinder->getOne([
            'customer_id' => $params['customer_id'],
        ]);
        $params['shipping_address'] = $customer->shipping_address;
        $params['transporter_id'] = $customer->transporter_id;
        if (empty($params['shipping_time']) && !empty($customer->transporter?->time_start)) {
            $params['shipping_time'] = $customer->transporter->time_start;
        }
        try {
            if (!empty($orderRegisterRequest->file('product_image'))) {
                $fileName = time().'.'.$orderRegisterRequest->file('product_image')->getClientOriginalExtension();
                $orderRegisterRequest->file('product_image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
                $params['product_image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
            }
            $orderCreator->save($params);
            // if (!empty($params['product_id'])) {
            //     $totalPrice = 0;
            //     $totalCost = 0;
            //     $totalProfit = 0;
            //     foreach($params['product_id'] as $productId) {
            //         $product = $productFinder->getOne([
            //             'product_id' => $productId,
            //         ]);
            //         $orderProductCreator->save([
            //             'order_id' => $order->order_id,
            //             'product_id' => $product->product_id,
            //             'cost' => $product->cost,
            //             'price' => $product->price,
            //             'profit' => $product->getProfit(),
            //         ]);
            //         $totalPrice += $product->price;
            //         $totalCost += $product->cost;
            //         $totalProfit += $product->getProfit();
            //     }
            //     $params['total_price'] = $totalPrice;
            //     $params['total_cost'] = $totalCost;
            //     $params['total_profit'] = $totalProfit;
            // }
            // $orderEditor->update($order, $params);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new ServiceException(__('register_failed'));
        }
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
            'multi' => [
                'product_id' => true,
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
        CustomerFinder $customerFinder,
        ProductFinder $productFinder,
        OrderProductDelete $orderProductDelete,
        OrderProductCreator $orderProductCreator
    ): RedirectResponse
    {
        try {
            $order = $orderFinder->getOne(['order_id' => $orderId]);
            $params = $orderRegisterRequest->validated();
            $customer = $customerFinder->getOne([
                'customer_id' => $params['customer_id'],
            ]);
            $params['shipping_address'] = $customer->shipping_address;
            $params['transporter_id'] = $customer->transporter_id;
            if (empty($params['shipping_time']) && !empty($customer->transporter?->time_start)) {
                $params['shipping_time'] = $customer->transporter->time_start;
            }
            DB::beginTransaction();
            $orderProductDelete->deleteByConditions([
                'order_id' => $order->order_id
            ]);
            if (!empty($params['product_id'])) {
                $totalPrice = 0;
                $totalCost = 0;
                $totalProfit = 0;
                foreach($params['product_id'] as $productId) {
                    $product = $productFinder->getOne([
                        'product_id' => $productId,
                    ]);
                    $orderProductCreator->save([
                        'order_id' => $order->order_id,
                        'product_id' => $product->product_id,
                        'cost' => $product->cost,
                        'price' => $product->price,
                        'profit' => $product->getProfit(),
                    ]);
                    $totalPrice += $product->price;
                    $totalCost += $product->cost;
                    $totalProfit += $product->getProfit();
                }
                $params['total_price'] = $totalPrice;
                $params['total_cost'] = $totalCost;
                $params['total_profit'] = $totalProfit;
            }
            $orderEditor->update($order, $params);
            DB::commit();
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
