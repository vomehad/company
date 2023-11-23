<?php

namespace App\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    title: "Сотрудник",
    description: "Инфо сотрудника",
    type: "object",
)]
class WorkerItem
{
    #[OA\Property(
        property: "id",
        description: "Идентификатор",
        type: "int",
        example: 1,
    )]
    public string $id;

    #[OA\Property(
        property: "name",
        description: "Имя сотрудника",
        type: "string",
        example: "Верхов Мариан Карлович",
    )]
    public string $name;

    #[OA\Property(
        property: "position_id",
        type: "int",
        enum: [1,2]
    )]
    public int $position_id;

    #[OA\Property(
        property: "department_id",
        type: "int",
        example: 1,
    )]
    public int $department_id;
}
