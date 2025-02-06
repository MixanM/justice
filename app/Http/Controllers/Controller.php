<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Throwable;

abstract class Controller
{
    /**
     * Возвращаем ошибку для исключений в json
     *
     * @param Exception|Throwable $exception
     * @param int $status
     *
     * @return Application|Response|ResponseFactory
     */
    public function jsonException($exception, int $status = SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY): Application|Response|ResponseFactory
    {
        Log::error(implode("\n", [
            $exception->getMessage() . ' In ' . $exception->getFile() . ' on line ' . $exception->getLine(),
            $exception->getTraceAsString(),
        ]));

        return response([
            'title' => 'Ошибка обработки',
            'message' => $exception->getMessage(),
            'trace' => ' In ' . $exception->getFile() . ' on line ' . $exception->getLine(),
        ], $status);
    }


}
