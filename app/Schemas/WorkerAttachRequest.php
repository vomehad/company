<?php

namespace App\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Запрос для добавления сотрудника к отделу",
    description: "Добавление сотрудника к отделу",
    required: ["worker_id", "department_id"],
    type: "object"
)]
class WorkerAttachRequest
{
    #[OA\Property(
        property: "worker_id",
        description: "ID сотрудника",
        type: "string",
        enum: [1,2]
    )]
    public string $worker_id;

    #[OA\Property(
        property: "department_id",
        description: "ID отдела",
        type: "string",
        example: 1
    )]
    public string $department_id;
}
