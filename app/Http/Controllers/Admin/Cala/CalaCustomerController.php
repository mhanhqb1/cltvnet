<?php

namespace App\Http\Controllers\Admin\Cala;

use App\Common\Definition\FileDefs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cala\CustomerRegisterRequest;
use App\Http\Requests\Cala\CustomerSearchRequest;
use App\Services\Cala\Customer\CustomerCreator;
use App\Services\Cala\Customer\CustomerDelete;
use App\Services\Cala\Customer\CustomerEditor;
use App\Services\Cala\Customer\CustomerFinder;
use App\Services\Cala\Customer\CustomerInitialization;
use App\Services\Cala\Transporter\TransporterFinder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CalaCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(
        CustomerSearchRequest $customerSearchRequest,
        CustomerFinder $customerFinder
    ): View
    {
        return view('admin.cala.customers.index')->with([
            'customers' => $customerFinder->getPaginator($customerSearchRequest->validated()),
            'attrNames' => $customerFinder->getAttributeNames(),
            'options' => [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(
        CustomerInitialization $customerInitialization,
        CustomerFinder $customerFinder,
        TransporterFinder $transporterFinder
    ): View
    {
        return view('admin.cala.customers.input', [
            'customer' => $customerInitialization->initCustomer(),
            'attrNames' => $customerFinder->getAttributeNames(),
            'attrInputTypes' => $customerFinder->getAttributeInputTypes(),
            'options' => [
                'transporter_id' => $transporterFinder->getAll([], true),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(
        CustomerRegisterRequest $customerRegisterRequest,
        CustomerCreator $customerCreator
    ): RedirectResponse
    {
        $params = $customerRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($customerRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$customerRegisterRequest->file('image')->getClientOriginalExtension();
            $customerRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
        }
        $customerCreator->save($params);
        return redirect()->route('admin.cala.customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(
        int $customerId,
        CustomerFinder $customerFinder,
        TransporterFinder $transporterFinder
    ): View
    {
        return view('admin.cala.customers.input')->with([
            'customer' => $customerFinder->getOne([
                'customer_id' => $customerId,
            ]),
            'attrNames' => $customerFinder->getAttributeNames(),
            'attrInputTypes' => $customerFinder->getAttributeInputTypes(),
            'options' => [
                'transporter_id' => $transporterFinder->getAll([], true),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(
        CustomerRegisterRequest $customerRegisterRequest,
        int $customerId,
        CustomerFinder $customerFinder,
        CustomerEditor $customerEditor
    ): RedirectResponse
    {
        $customer = $customerFinder->getOne(['customer_id' => $customerId]);
        $oldImage = '';
        $params = $customerRegisterRequest->validated();
        $params['slug'] = createSlug($params['name']);
        if (!empty($customerRegisterRequest->file('image'))) {
            $fileName = time().'-'.$params['slug'].'.'.$customerRegisterRequest->file('image')->getClientOriginalExtension();
            $customerRegisterRequest->file('image')->storeAs(FileDefs::IMAGE_STORE_PATH, $fileName);
            $params['image'] = FileDefs::IMAGE_PUBLIC_PATH . $fileName;
            $oldImage = $customer->image;
        }
        $customerEditor->update($customer, $params);
        if ($oldImage) {
            deleteFile($oldImage);
        }
        return redirect()->route('admin.cala.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(
        int $customerId,
        CustomerFinder $customerFinder,
        CustomerDelete $customerDelete
    ): RedirectResponse
    {
        $customer = $customerFinder->getOne(['customer_id' => $customerId]);
        deleteFile($customer->image);
        $customerDelete->destroy($customer);
        return redirect()->route('admin.cala.customers.index');
    }
}
