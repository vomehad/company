<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Worker\WorkerCollection;
use App\Service\WorkerService;
use Illuminate\Http\JsonResponse;
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
}
