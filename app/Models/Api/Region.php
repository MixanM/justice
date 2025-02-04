<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Regions
 *
 * @property int id
 * @property string name
 * @property int code //Код реи=гиона
 * @property int federal_district_id // КОД ФО
 *
 */

class Region extends Model
{
    /*** @var string[] */
    protected $fillable = ['name', 'code', 'federal_district_id'];

    /*** @var string */
    protected $table = 'regions';


    /**
     * @return BelongsTo
     */
    public  function district(): BelongsTo
    {
        return $this->belongsTo(FederalDistrict::class);
    }


    /**
     * @return HasMany
     */
    public function cities(): HasMany
    {
       return $this->hasMany(City::class);
    }
}
