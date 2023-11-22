<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Branch\BranchCollection;
use App\Service\BranchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BranchController extends ApiController
{
    public function __construct(
        private BranchService $service,
    ) {}

    public function index(): JsonResponse
    {
        $branchs = $this->service->getAll();
        $response = new BranchCollection($branchs);

        return $response->response()->setStatusCode(Response::HTTP_OK);
    }
}
