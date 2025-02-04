<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Contract
 *
 * @property int $id
 * @property int $customer_id // Заказчик
 * @property null|int $executor_id // Исполнитель
 * @property string $comment // Комментарий
 * @property int $price // Цена заказа
 * @property int $city_id // ID города из таблицы cities
 * @property string $end_date // Дата окончания заявки
 */
class Contract extends Model
{
    /** @var string */
    protected $table = 'contracts';

    /** @var string[] */
    protected $fillable = ['customer_id', 'executor_id', 'comment', 'price', 'city_id', 'end_date'];

    /**
     * Заказчик
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /** Исполнитель
     *
     * @return BelongsTo
     */
    public function executor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'executor_id');
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
