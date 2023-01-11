<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DiscountUnits;
use App\Http\Requests\Admin\DiscountRequest;
use App\Models\Discount;
use App\Repositories\DiscountRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DiscountController
{
    /**
     * @var \App\Repositories\DiscountRepository
     */
    protected DiscountRepository $discountRepository;

    public function __construct()
    {
        $this->discountRepository = new DiscountRepository();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function list(Request $request): View
    {
        return \view(
            'admin.discount.list',
            ['entities' => $this->discountRepository->list($request->get('filter'))]
        );
    }

    public function create(): View
    {
        return \view('admin.discount.create', ['units' => DiscountUnits::getValues()]);
    }

    public function show(Discount $discount): View
    {
        return \view('admin.discount.show', ['entity' => $discount]);
    }

    public function edit(Discount $discount): View
    {
        return \view('admin.discount.edit', ['entity' => $discount]);
    }

    /**
     * @param \App\Http\Requests\Admin\DiscountRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(DiscountRequest $request): RedirectResponse
    {
        $this->discountRepository->create($request->validated());

        return redirect(route('admin.discount.list'));
    }

    public function update(DiscountRequest $request, Discount $discount): RedirectResponse
    {
        $this->discountRepository->update($discount, $request->validated());

        return redirect(route('admin.discount.list'));
    }

    public function delete(Discount $discount): RedirectResponse
    {
        $discount->delete();

        return redirect(route('admin.discount.list'));
    }

    public function forceDelete(Discount $discount): RedirectResponse
    {
        $discount->forceDelete();

        return redirect(route('admin.discount.list'));
    }
}
