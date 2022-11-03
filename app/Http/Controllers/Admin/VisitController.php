<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\VisitRequest;
use App\Repositories\VisitRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    /**
     * @param \App\Http\Requests\Admin\VisitRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function list(VisitRequest $request): View
    {
        return \view(
            'admin.visit.list',
            [
                'entities' => $this->visitRepository->groupListPaginate(),
            ]
        );
    }

    public function create(): View
    {
        return \view('admin.visit.create');
    }

    public function show(Visit $visit): View
    {
        return \view('admin.visit.show', ['entity' => $visit]);
    }

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

    public function update(VisitRequest $request, Visit $visit): RedirectResponse
    {
        $this->visitRepository->update($visit, $request->validated());

        return redirect(route('admin.visit.list'));
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
