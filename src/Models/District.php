<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dicibi\IndoRegion\Models;

use Dicibi\IndoRegion\Enums\Feature;
use Dicibi\IndoRegion\IndoRegion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

/**
 * District Model.
 *
 * @property int $id
 * @property string $name
 * @property Regency $regency
 * @property \Illuminate\Database\Eloquent\Collection<int, \Dicibi\IndoRegion\Models\Village> $villages
 * @property int|string $idn_regency_id
 */
class District extends Model
{
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setHidden([
            IndoRegion::getForeignKeyId(Feature::Regency),
        ]);
    }

    public function getTable(): string
    {
        return IndoRegion::getTable(Feature::District);
    }

    /**
     * Get the regency that owns the district.
     *
     * @return Relations\BelongsTo<Regency, self>
     */
    public function regency(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.regency'), IndoRegion::getForeignKeyId(Feature::Regency));
    }

    /**
     * @return Relations\HasMany<Village>
     */
    public function villages(): Relations\HasMany
    {
        return $this->hasMany(config('indoregion.models.village'), IndoRegion::getForeignKeyId(Feature::District));
    }
}
