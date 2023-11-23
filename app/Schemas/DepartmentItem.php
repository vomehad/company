<?php

namespace App\Schemas;

/**
 * @OA\Schema(
 *     description="Инфо отдела",
 *     type="object",
 *     title="Отдел",
 * )
 */
class DepartmentItem
{
    /**
     * @OA\Property(property="id", type="int", example="1", description="Идентификатор")
     *
     * @var string
     */
    public string $id;

    /**
     * @OA\Property(property="name", type="string", example="Cats", description="Название отдела")
     *
     * @var string
     */
    public string $name;
}
