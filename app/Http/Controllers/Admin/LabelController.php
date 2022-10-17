<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LabelRequest;
use App\Models\Label;
use App\Repositories\LabelRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LabelController
{
    /**
     * @var \App\Repositories\LabelRepository
     */
    protected LabelRepository $labelRepository;

    public function __construct()
    {
        $this->labelRepository = new LabelRepository();
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function list(): View
    {
        return \view('admin.label.list', ['entities' => $this->labelRepository->list()]);
    }
    public function deletedList(): View
    {
        $entities = $this->labelRepository->list(true);

        return \view('admin.label.list', ['entities' => $entities]);
    }

    public function create(): View
    {
        return \view('admin.label.create');
    }

    public function show(Label $label): View
    {
        return \view('admin.label.show', ['entity' => $label]);
    }

    public function edit(Label $label): View
    {
        return \view('admin.label.edit', ['entity' => $label]);
    }

    /**
     * @param \App\Http\Requests\Admin\LabelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(LabelRequest $request): RedirectResponse
    {
        $this->labelRepository->create($request->validated());

        return redirect(route('admin.label.list'));
    }

    public function update(LabelRequest $request, Label $label): RedirectResponse
    {
        $this->labelRepository->update($label, $request->validated());

        return redirect(route('admin.label.list'));
    }

    public function delete(Label $label): RedirectResponse
    {
        $label->delete();

        return redirect(route('admin.label.list'));
    }

    public function forceDelete(Label $label): RedirectResponse
    {
        $label->forceDelete();

        return redirect(route('admin.label.list'));
    }
}
