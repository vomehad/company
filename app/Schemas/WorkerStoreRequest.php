<?php

namespace App\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Запрос для создания сотрудника",
    description: "Создание нового сотрудника",
    required: ["name"],
    type: "object"
)]
class WorkerStoreRequest
{
    #[OA\Property(
        property: "name",
        description: "Имя сотрудника",
        type: "string",
        example: "Верхов Мариан Карлович"
    )]
    public string $name;
}
