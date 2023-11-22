<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\Department\DepartmentCollection;
use App\Http\Resources\Department\DepartmentResource;
use App\Http\Resources\SuccessResource;
use App\Service\DepartmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends ApiController
{
    public function __construct(
        private DepartmentService $service,
    ) {}

    public function index(): JsonResponse
    {
        $departments = $this->service->getAll();

        $resource = new DepartmentCollection($departments);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function store(DepartmentRequest $request): JsonResponse
    {
        $data = $request->validated();

        $department = $this->service->add($data);

        $resource = new SuccessResource($department);

        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function getOne(int $id): JsonResponse
    {
        $department = $this->service->getOneById($id);

        $resource = new DepartmentResource($department);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }
}
