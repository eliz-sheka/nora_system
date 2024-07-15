<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PaymentMethods;
use App\Http\Requests\Admin\CloseVisitsRequest;
use App\Http\Requests\Admin\ShowRelatedVisitsRequest;
use App\Http\Requests\Admin\VisitRequest;
use App\Models\Visit;
use App\Repositories\DiscountRepository;
use App\Repositories\LabelRepository;
use App\Repositories\VisitRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VisitController
{
    /**
     * @var \App\Repositories\VisitRepository
     */
    protected VisitRepository $visitRepository;

    public function __construct()
    {
        $this->visitRepository = new VisitRepository();
    }

    public function list(VisitRequest $request): \Inertia\Response
    {
        return Inertia::render(
            'admin-panel/visits/VisitsList',
            [
                'visits' => $this->visitRepository->list(),
                'labels' => (new LabelRepository)->list()
            ],
        );
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        $data = [
            'paymentMethods' => PaymentMethods::getMappedNames(),
            'discounts' => (new DiscountRepository)->getFormatted(),
            'labels' => (new LabelRepository)->getAvailable(),
        ];

        return \view('admin.visit.create', $data);
    }

    /**
     * @param \App\Models\Visit $visit
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Visit $visit): View
    {
        return \view('admin.visit.show', ['entity' => $visit->load('visitors')]);
    }

    /**
     * @param \App\Http\Requests\Admin\ShowRelatedVisitsRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function showRelated(ShowRelatedVisitsRequest $request): View
    {
        $visits = $this->visitRepository->getMany($request->validated(['id']));

        return \view('admin.visit.related', ['entities' => $visits]);
    }

    /**
     * @param \App\Models\Visit $visit
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Visit $visit): View
    {
        return \view('admin.visit.edit', ['entity' => $visit]);
    }

    /**
     * @param \App\Http\Requests\Admin\VisitRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(VisitRequest $request): RedirectResponse
    {
        $this->visitRepository->create($request->validated());

        return redirect(route('admin.visit.list'));
    }

    /**
     * @param \App\Http\Requests\Admin\VisitRequest $request
     * @param \App\Models\Visit $visit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VisitRequest $request, Visit $visit): RedirectResponse
    {
        $this->visitRepository->update($visit, $request->validated());

        return redirect(route('admin.visit.list'));
    }

    public function showClose(CloseVisitsRequest $request): RedirectResponse
    {
        $visits = $this->visitRepository->close();

        return redirect(route('admin.visit.related'), ['entities' => $visits]);
    }

    public function close(CloseVisitsRequest $request): RedirectResponse
    {
        $visits = $this->visitRepository->close();

        return redirect(route('admin.visit.related'), ['entities' => $visits]);
    }

    public function delete(Visit $visit): RedirectResponse
    {
        $visit->delete();

        return redirect(route('admin.visit.list'));
    }

    public function forceDelete(Visit $visit): RedirectResponse
    {
        $visit->forceDelete();

        return redirect(route('admin.visit.list'));
    }
}
