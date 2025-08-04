<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Tag(
 *     name="Activities",
 *     description="API для работы с видами деятельности"
 * )
 */
class ActivitySwaggerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/activity",
     *     tags={"Activities"},
     *     summary="Получить список всех видов деятельности",
     *     security={{"apiKey": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Activity")
     *             )
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Get(
     *     path="/api/activity/tree",
     *     tags={"Activities"},
     *     summary="Получить древовидную структуру видов деятельности",
     *     security={{"apiKey": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Activity")
     *             )
     *         )
     *     )
     * )
     */
    public function tree() {}

    /**
     * @OA\Post(
     *     path="/api/activity",
     *     tags={"Activities"},
     *     summary="Создать новый вид деятельности",
     *     security={{"apiKey": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ActivityStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Вид деятельности создан",
     *         @OA\JsonContent(ref="#/components/schemas/Activity")
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
     *     path="/api/activity/{activityId}",
     *     tags={"Activities"},
     *     summary="Получить вид деятельности по ID",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="activityId",
     *         in="path",
     *         required=true,
     *         description="ID вида деятельности",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(ref="#/components/schemas/Activity")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Вид деятельности не найден"
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Patch(
     *     path="/api/activity/{activityId}",
     *     tags={"Activities"},
     *     summary="Обновить вид деятельности",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="activityId",
     *         in="path",
     *         required=true,
     *         description="ID вида деятельности",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ActivityUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Вид деятельности обновлен",
     *         @OA\JsonContent(ref="#/components/schemas/Activity")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Вид деятельности не найден"
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/activity/{activityId}",
     *     tags={"Activities"},
     *     summary="Удалить вид деятельности",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="activityId",
     *         in="path",
     *         required=true,
     *         description="ID вида деятельности",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Вид деятельности удален",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Activity by id: 1 deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Вид деятельности не найден"
     *     )
     * )
     */
    public function destroy() {}

    /**
     * @OA\Get(
     *     path="/api/activity/by-activity/{activity}",
     *     tags={"Activities"},
     *     summary="Поиск компаний по виду деятельности (включая дочерние)",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="activity",
     *         in="path",
     *         required=true,
     *         description="Идентификатор вида деятельности",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="activity", type="string"),
     *             @OA\Property(property="companies_count", type="integer"),
     *             @OA\Property(
     *                 property="companies",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Company")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Вид деятельности не найден",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Activity not found")
     *         )
     *     )
     * )
     */
    public function searchByActivity() {}

    /**
     * @OA\Schema(
     *     schema="Activity",
     *     type="object",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="name", type="string", example="IT-услуги"),
     *     @OA\Property(property="identifier", type="string", example="it_services"),
     *     @OA\Property(property="parent_id", type="integer", nullable=true, example=null),
     *     @OA\Property(property="children", type="array", @OA\Items(ref="#/components/schemas/Activity"))
     * )
     *
     * @OA\Schema(
     *     schema="ActivityStoreRequest",
     *     required={"name", "identifier"},
     *     @OA\Property(property="name", type="string", example="IT-услуги"),
     *     @OA\Property(property="identifier", type="string", example="it_services"),
     *     @OA\Property(property="parent_id", type="integer", nullable=true, example=null)
     * )
     *
     * @OA\Schema(
     *     schema="ActivityUpdateRequest",
     *     @OA\Property(property="name", type="string", example="Обновленное название"),
     *     @OA\Property(property="identifier", type="string", example="updated_identifier"),
     *     @OA\Property(property="parent_id", type="integer", nullable=true, example=2)
     * )
     *
     * @OA\Schema(
     *     schema="Company",
     *     type="object",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="name", type="string", example="ООО Ромашка"),
     *     @OA\Property(property="activities", type="array", @OA\Items(ref="#/components/schemas/Activity"))
     * )
     */
    public function schemas() {}
}
