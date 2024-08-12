<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\VisitTypeRequest;
use App\Models\VisitType;
use App\Repositories\VisitTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Inertia\Inertia;

class VisitTypeController
{
    private VisitTypeRepository $visitTypeRepository;

    public function __construct()
    {
        $this->visitTypeRepository = new VisitTypeRepository();
    }

    public function list(): \Inertia\Response
    {
        return Inertia::render(
            'admin-panel/visit-types/VisitTypesList',
            [
                'visitTypes' => $this->visitTypeRepository->list(),
            ],
        );
    }

    public function save(VisitTypeRequest $request): JsonResponse
    {
        $visitType = $this->visitTypeRepository->create($request->validated());

        return new JsonResponse($visitType, Response::HTTP_CREATED);
    }

    public function update(VisitTypeRequest $request, VisitType $visitType): JsonResponse
    {
        $this->visitTypeRepository->update($visitType, $request->validated());

        return new JsonResponse($visitType, Response::HTTP_OK);
    }

    public function delete(VisitType $visitType): JsonResponse
    {
        $visitType->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
