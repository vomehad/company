<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\Department\DepartmentCollection;
use App\Http\Resources\Department\DepartmentResource;
use App\Http\Resources\SuccessResource;
use App\Service\DepartmentService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Attributes as OA;

class DepartmentController extends ApiController
{
    public function __construct(
        private DepartmentService $service,
    ) {}

    /**
     * @OA\Get(
     *     path="/department",
     *     operationId="allDepartment",
     *     tags={"Department"},
     *     summary="Список отделов",
     *     @OA\Response(
     *         response="200",
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/DepartmentItem"),
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
        $departments = $this->service->getAll();

        $resource = new DepartmentCollection($departments);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/department",
     *     operationId="createDepartment",
     *     tags={"Department"},
     *     summary="Добавление отдела",
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
    public function store(DepartmentRequest $request): JsonResponse
    {
        $data = $request->validated();

        $department = $this->service->add($data);

        $resource = new SuccessResource($department);

        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/department/{id}",
     *     operationId="getDepartment",
     *     tags={"Department"},
     *     summary="Получить инфо отдела",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/DepartmentItem"),
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Неавторизован",
     *         @OA\JsonContent(ref="#/components/schemas/JsonFaultResponse"),
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Не найден",
     *         @OA\JsonContent(ref="#/components/schemas/JsonFaultResponse"),
     *     ),
     * )
     */
    public function show(int $id): JsonResponse
    {
        $department = $this->service->getOneById($id);

        $resource = new DepartmentResource($department);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }
}
