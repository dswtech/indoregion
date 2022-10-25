<?php

namespace Dicibi\IndoRegion\Concerns;

use Dicibi\IndoRegion\Enums\Feature;
use Dicibi\IndoRegion\IndoRegion;
use Illuminate\Database\Eloquent\Relations;

trait HasIndonesiaRegionData
{
    public function province(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.province'), IndoRegion::getForeignKeyId(Feature::Province));
    }

    public function regency(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.regency'), IndoRegion::getForeignKeyId(Feature::Regency));
    }

    public function district(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.district'), IndoRegion::getForeignKeyId(Feature::District));
    }

    public function village(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.village'), IndoRegion::getForeignKeyId(Feature::Village));
    }
}