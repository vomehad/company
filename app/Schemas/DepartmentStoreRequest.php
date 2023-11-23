<?php

namespace App\Schemas;

/**
 * @OA\Schema(
 *     description="Создание нового отдела",
 *     type="object",
 *     title="Запрос для создания отдела",
 *     required={"name"}
 * )
 */
class DepartmentStoreRequest
{
    /**
     * @OA\Property(property="name", type="string", example="Wolfs", description="Имя отдела")
     *
     * @var string
     */
    public string $name;
}
