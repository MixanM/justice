<?php

namespace App\Http\Responses;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Базовый класс для API-ответов
 */
class Response extends JsonResource
{
    /**
     * Отключаем автоматическое оборачивание данных
     *
     * @var null|string
     */
    public static $wrap = null;

    /**
     *
     * @param mixed $resource
     * @return AnonymousResourceCollection|null
     */
    public static function collection($resource): ?AnonymousResourceCollection
    {
        return $resource ? new AnonymousResourceCollection($resource, static::class) : null;
    }

    /**
     * коллекция, если ресурс не null
     *
     * @param Collection $resource
     * @return AnonymousResourceCollection
     */
    public static function collectionNotNull(Collection $resource): AnonymousResourceCollection
    {
        return new AnonymousResourceCollection($resource, static::class);
    }
}
