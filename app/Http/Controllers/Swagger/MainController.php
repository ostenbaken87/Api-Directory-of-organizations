<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         title="Directory of Organizations API",
 *         version="1.0.0",
 *         description="API для работы со справочником организаций, зданий и видов деятельности",
 *     ),
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="apiKey",
 *     type="apiKey",
 *     in="header",
 *     name="x-api-key",
 *     description="Static API key authentication"
 * )
 *
 * @OA\PathItem(
 *     path="/api"
 * )
 */
class MainController extends Controller
{
    //
}
