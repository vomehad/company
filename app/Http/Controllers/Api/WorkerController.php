<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\AttachRequest;
use App\Http\Requests\WorkerRequet;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\Worker\WorkerCollection;
use App\Service\WorkerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkerController extends ApiController
{
    public function __construct(
        private WorkerService $service,
    ) {}

    public function index(): JsonResponse
    {
        $workers = $this->service->getAll();
        $response = new WorkerCollection($workers);

        return $response->response()->setStatusCode(Response::HTTP_OK);
    }

    public function store(WorkerRequet $request): RedirectResponse
    {
        $data = $request->validated();

        $this->service->add($data);

        return redirect()->route('api.worker.all');
    }

    public function addWorkerToDepartment(AttachRequest $request): JsonResponse
    {
        $data = $request->validated();

        $attached = $this->service->attachWorker($data);

        $resource = new SuccessResource($attached);

        return $resource->response()->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
