<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Cities
 *
 * @property int id
 * @property string name
 * @property int region_id // ID региона из таблицы регионов
 */

class City extends Model
{
    /*** @var string[] */
    protected $fillable = ['name', 'region_id', 'code'];

    /*** @var string */
    protected $table = 'cities';

    /**
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
