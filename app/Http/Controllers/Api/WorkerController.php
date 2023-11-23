<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\AttachRequest;
use App\Http\Requests\WorkerRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\Worker\WorkerCollection;
use App\Service\WorkerService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class WorkerController extends ApiController
{
    public function __construct(
        private WorkerService $service,
    ) {}

    /**
     * @OA\Get(
     *     path="/worker",
     *     operationId="allWorker",
     *     tags={"Worker"},
     *     summary="Список сотрудников",
     *     @OA\Response(
     *         response="200",
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/WorkerItem"),
     *             )
     *         ),
     *      ),
     *     @OA\Response(
     *         response="401",
     *         description="Неавторизован",
     *         @OA\JsonContent(ref="#/components/schemas/JsonFaultResponse"),
     *     ),
     * )
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $workers = $this->service->getAll();
        $response = new WorkerCollection($workers);

        return $response->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/worker",
     *     operationId="createWorker",
     *     tags={"Worker"},
     *     summary="Добавление сотрудника",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/WorkerStoreRequest")
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Успешно создан",
     *         @OA\JsonContent(ref="#/components/schemas/JsonResponse"),
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Ошибки валидации",
     *         @OA\JsonContent(ref="#/components/schemas/JsonFaultValidation"),
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Неавторизован",
     *         @OA\JsonContent(ref="#/components/schemas/JsonFaultResponse"),
     *     ),
     * )
     */
    public function store(WorkerRequest $request): JsonResponse
    {
        $data = $request->validated();

        $worker = $this->service->add($data);

        $resource = new SuccessResource($worker);

        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Post(
     *     path="/attach",
     *     operationId="attachWorkerToDepartment",
     *     tags={"Worker"},
     *     summary="Добавление сотрудника к отделу",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DepartmentStoreRequest")
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Успешно создан",
     *         @OA\JsonContent(ref="#/components/schemas/JsonResponse"),
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Ошибки валидации",
     *         @OA\JsonContent(ref="#/components/schemas/JsonFaultValidation"),
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Неавторизован",
     *         @OA\JsonContent(ref="#/components/schemas/JsonFaultResponse"),
     *     ),
     * )
     */
    public function addWorkerToDepartment(AttachRequest $request): JsonResponse
    {
        $data = $request->validated();

        $attached = $this->service->attachWorker($data);

        $resource = new SuccessResource($attached);

        return $resource->response()->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
