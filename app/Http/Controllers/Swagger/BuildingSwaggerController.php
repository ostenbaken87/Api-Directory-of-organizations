<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Tag(
 *     name="Buildings",
 *     description="API для работы со зданиями"
 * )
 */
class BuildingSwaggerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/building",
     *     tags={"Buildings"},
     *     summary="Получить список всех зданий",
     *     security={{"apiKey": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Building")
     *             )
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/building",
     *     tags={"Buildings"},
     *     summary="Создать новое здание",
     *     security={{"apiKey": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BuildingStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Здание создано",
     *         @OA\JsonContent(ref="#/components/schemas/Building")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации"
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/building/{buildingId}",
     *     tags={"Buildings"},
     *     summary="Получить здание по ID",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="buildingId",
     *         in="path",
     *         required=true,
     *         description="ID здания",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(ref="#/components/schemas/Building")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Здание не найдено"
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Patch(
     *     path="/api/building/{buildingId}",
     *     tags={"Buildings"},
     *     summary="Обновить здание",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="buildingId",
     *         in="path",
     *         required=true,
     *         description="ID здания",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BuildingUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Здание обновлено",
     *         @OA\JsonContent(ref="#/components/schemas/Building")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Здание не найдено"
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/building/{buildingId}",
     *     tags={"Buildings"},
     *     summary="Удалить здание",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="buildingId",
     *         in="path",
     *         required=true,
     *         description="ID здания",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Здание удалено"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Здание не найдено"
     *     )
     * )
     */
    public function destroy() {}

    /**
     * @OA\Schema(
     *     schema="Building",
     *     type="object",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="address", type="string", example="г. Москва, ул. Тверская, 10"),
     *     @OA\Property(property="latitude", type="number", format="float", example=55.7558),
     *     @OA\Property(property="longitude", type="number", format="float", example=37.6176)
     * )
     *
     * @OA\Schema(
     *     schema="BuildingStoreRequest",
     *     required={"address", "latitude", "longitude"},
     *     @OA\Property(property="address", type="string", example="г. Москва, ул. Тверская, 10"),
     *     @OA\Property(property="latitude", type="number", format="float", example=55.7558),
     *     @OA\Property(property="longitude", type="number", format="float", example=37.6176)
     * )
     *
     * @OA\Schema(
     *     schema="BuildingUpdateRequest",
     *     @OA\Property(property="address", type="string", example="Обновленный адрес"),
     *     @OA\Property(property="latitude", type="number", format="float", example=55.7558),
     *     @OA\Property(property="longitude", type="number", format="float", example=37.6176)
     * )
     */
    public function schemas() {}
}
