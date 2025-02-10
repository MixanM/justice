<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Exception;

/**
 * Базовый класс для сервисов
 */
abstract class Service
{
    /** @var string */
    const DEFAULT_ERROR_MESSAGE = 'Ошибка обработки запроса';

    /**
     * Обработчик ошибок
     *
     * @param Exception $exception
     * @param string $message
     * @return JsonResponse
     */
    protected function handleException(
        Exception $exception,
        string $message): JsonResponse
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => false,
            'message' => self::DEFAULT_ERROR_MESSAGE,
            'error' => $exception->getMessage(),
        ], 500);
    }
}
