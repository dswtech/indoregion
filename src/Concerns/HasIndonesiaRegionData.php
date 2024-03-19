<?php

namespace Dicibi\IndoRegion\Concerns;

use Dicibi\IndoRegion\Enums\Feature;
use Dicibi\IndoRegion\IndoRegion;
use Dicibi\IndoRegion\Models\District;
use Dicibi\IndoRegion\Models\Province;
use Dicibi\IndoRegion\Models\Regency;
use Dicibi\IndoRegion\Models\Village;
use Illuminate\Database\Eloquent\Relations;

trait HasIndonesiaRegionData
{
    /**
     * @return Relations\BelongsTo<Province, self>
     */
    public function province(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.province'), IndoRegion::getForeignKeyId(Feature::Province));
    }

    /**
     * @return Relations\BelongsTo<Regency, self>
     */
    public function regency(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.regency'), IndoRegion::getForeignKeyId(Feature::Regency));
    }

    /**
     * @return Relations\BelongsTo<District, self>
     */
    public function district(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.district'), IndoRegion::getForeignKeyId(Feature::District));
    }

    /**
     * @return Relations\BelongsTo<Village, self>
     */
    public function village(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.village'), IndoRegion::getForeignKeyId(Feature::Village));
    }
}
