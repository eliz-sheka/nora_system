<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LabelRequest;
use App\Models\Label;
use App\Repositories\LabelRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Inertia\Inertia;

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

    public function list(): \Inertia\Response
    {
        return Inertia::render(
            'admin-panel/labels/LabelsList',
            [
                'labels' => $this->labelRepository->list(),
            ],
        );
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

    public function save(LabelRequest $request): JsonResponse
    {
        $label = $this->labelRepository->create($request->validated());

        return new JsonResponse($label, Response::HTTP_CREATED);
    }

    public function update(LabelRequest $request, Label $label): JsonResponse
    {
        $this->labelRepository->update($label, $request->validated());

        return new JsonResponse($label, Response::HTTP_OK);
    }

    public function delete(Label $label): JsonResponse
    {
        $label->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    public function forceDelete(Label $label): RedirectResponse
    {
        $label->forceDelete();

        return redirect(route('admin.label.list'));
    }
}
