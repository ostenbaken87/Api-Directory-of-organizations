<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Tag(
 *     name="Companies",
 *     description="API для работы с компаниями"
 * )
 */
class CompanySwaggerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/company",
     *     tags={"Companies"},
     *     summary="Получить список компаний с пагинацией",
     *     security={{"apiKey": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/CompanyWithRelations")
     *             ),
     *             @OA\Property(
     *                 property="links",
     *                 type="object",
     *                 ref="#/components/schemas/PaginationLinks"
     *             ),
     *             @OA\Property(
     *                 property="meta",
     *                 type="object",
     *                 ref="#/components/schemas/PaginationMeta"
     *             )
     *         )
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/company",
     *     tags={"Companies"},
     *     summary="Создать новую компанию",
     *     security={{"apiKey": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CompanyStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Компания создана",
     *         @OA\JsonContent(ref="#/components/schemas/CompanyWithRelations")
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
     *     path="/api/company/{companyId}",
     *     tags={"Companies"},
     *     summary="Получить компанию по ID",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="companyId",
     *         in="path",
     *         required=true,
     *         description="ID компании",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(ref="#/components/schemas/CompanyWithRelations")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Компания не найдена"
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Patch(
     *     path="/api/company/{companyId}",
     *     tags={"Companies"},
     *     summary="Обновить данные компании",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="companyId",
     *         in="path",
     *         required=true,
     *         description="ID компании",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CompanyUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Компания обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/CompanyWithRelations")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Компания не найдена"
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/company/{companyId}",
     *     tags={"Companies"},
     *     summary="Удалить компанию",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="companyId",
     *         in="path",
     *         required=true,
     *         description="ID компании",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Компания удалена",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Company deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Компания не найдена"
     *     )
     * )
     */
    public function destroy() {}

    /**
     * @OA\Get(
     *     path="/api/company/by-building/{buildingId}",
     *     tags={"Companies"},
     *     summary="Получить компании по зданию",
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
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CompanyWithRelations")
     *         )
     *     )
     * )
     */
    public function byBuilding() {}

    /**
     * @OA\Get(
     *     path="/api/company/by-activity/{activityId}",
     *     tags={"Companies"},
     *     summary="Получить компании по виду деятельности",
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
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CompanyWithRelations")
     *         )
     *     )
     * )
     */
    public function byActivity() {}

    /**
     * @OA\Get(
     *     path="/api/company/search",
     *     tags={"Companies"},
     *     summary="Поиск компаний по названию",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         required=true,
     *         description="Название компании для поиска",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             @OA\Property(property="companies", type="array", @OA\Items(ref="#/components/schemas/CompanyWithRelations")),
     *             @OA\Property(property="message", type="string", example="Found 5 companies")
     *         )
     *     )
     * )
     */
    public function search() {}

    /**
     * @OA\Get(
     *     path="/api/company/search-geo",
     *     tags={"Companies"},
     *     summary="Поиск компаний по географическим координатам",
     *     security={{"apiKey": {}}},
     *     @OA\Parameter(
     *         name="lat",
     *         in="query",
     *         required=true,
     *         description="Широта центра поиска",
     *         @OA\Schema(type="number", format="float")
     *     ),
     *     @OA\Parameter(
     *         name="lng",
     *         in="query",
     *         required=true,
     *         description="Долгота центра поиска",
     *         @OA\Schema(type="number", format="float")
     *     ),
     *     @OA\Parameter(
     *         name="radius",
     *         in="query",
     *         required=true,
     *         description="Радиус поиска в метрах",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="meta",
     *                 type="object",
     *                 @OA\Property(property="latitude", type="number", format="float"),
     *                 @OA\Property(property="longitude", type="number", format="float"),
     *                 @OA\Property(property="radius", type="integer"),
     *                 @OA\Property(property="total_buildings", type="integer"),
     *                 @OA\Property(property="total_companies", type="integer")
     *             ),
     *             @OA\Property(
     *                 property="results",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(
     *                         property="building",
     *                         type="object",
     *                         @OA\Property(property="id", type="integer"),
     *                         @OA\Property(property="address", type="string"),
     *                         @OA\Property(
     *                             property="coordinates",
     *                             type="object",
     *                             @OA\Property(property="latitude", type="number", format="float"),
     *                             @OA\Property(property="longitude", type="number", format="float")
     *                         )
     *                     ),
     *                     @OA\Property(
     *                         property="companies",
     *                         type="array",
     *                         @OA\Items(
     *                             @OA\Property(property="id", type="integer"),
     *                             @OA\Property(property="name", type="string"),
     *                             @OA\Property(property="phones", type="array", @OA\Items(type="string"))
     *                         )
     *                     )
     *                 )
     *             ),
     *             @OA\Property(property="message", type="string", example="Found 3 buildings")
     *         )
     *     )
     * )
     */
    public function searchGeo() {}

    /**
     * @OA\Schema(
     *     schema="CompanyWithRelations",
     *     type="object",
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="name", type="string", example="ООО Ромашка"),
     *     @OA\Property(
     *         property="phones",
     *         type="array",
     *         @OA\Items(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="number", type="string")
     *         )
     *     ),
     *     @OA\Property(
     *         property="activities",
     *         type="array",
     *         @OA\Items(ref="#/components/schemas/Activity")
     *     ),
     *     @OA\Property(
     *         property="building",
     *         type="object",
     *         ref="#/components/schemas/Building"
     *     )
     * )
     *
     * @OA\Schema(
     *     schema="CompanyStoreRequest",
     *     required={"name", "building_id"},
     *     @OA\Property(property="name", type="string", example="ООО Ромашка"),
     *     @OA\Property(property="building_id", type="integer", example=1),
     *     @OA\Property(
     *         property="activity_ids",
     *         type="array",
     *         @OA\Items(type="integer"),
     *         example={1, 2}
     *     ),
     *     @OA\Property(
     *         property="phones",
     *         type="array",
     *         @OA\Items(type="string"),
     *         example={"+79991234567", "+79997654321"}
     *     )
     * )
     *
     * @OA\Schema(
     *     schema="CompanyUpdateRequest",
     *     @OA\Property(property="name", type="string", example="Обновленное название"),
     *     @OA\Property(property="building_id", type="integer", example=2),
     *     @OA\Property(
     *         property="activity_ids",
     *         type="array",
     *         @OA\Items(type="integer"),
     *         example={3, 4}
     *     ),
     *     @OA\Property(
     *         property="phones",
     *         type="array",
     *         @OA\Items(type="string"),
     *         example={"+79998887766"}
     *     )
     * )
     *
     * @OA\Schema(
     *     schema="PaginationLinks",
     *     type="object",
     *     @OA\Property(property="first", type="string"),
     *     @OA\Property(property="last", type="string"),
     *     @OA\Property(property="prev", type="string", nullable=true),
     *     @OA\Property(property="next", type="string", nullable=true)
     * )
     *
     * @OA\Schema(
     *     schema="PaginationMeta",
     *     type="object",
     *     @OA\Property(property="current_page", type="integer"),
     *     @OA\Property(property="from", type="integer"),
     *     @OA\Property(property="last_page", type="integer"),
     *     @OA\Property(property="path", type="string"),
     *     @OA\Property(property="per_page", type="integer"),
     *     @OA\Property(property="to", type="integer"),
     *     @OA\Property(property="total", type="integer")
     * )
     */
    public function schemas() {}
}
