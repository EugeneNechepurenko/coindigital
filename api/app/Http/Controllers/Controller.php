<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
     * @OA\Info(
     *      version="1.0.0",
     *      title="OpenApi Documentation",
     *      description="Документация для микро сервиса",
     *      @OA\Contact(
     *          email=L5_SWAGGER_CONST_EMAIL
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Основной API"
     * )
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST_V2,
     *      description="Для Логирования"
     * )
     *
     * @OA\Tag(
     *     name="Channels",
     *     description="Работа с каналами"
     * )
     */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
