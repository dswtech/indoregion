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
 * Regency Model.
 *
 * @property string $name
 * @property \Dicibi\IndoRegion\Models\Province $province
 * @property \Illuminate\Database\Eloquent\Collection<int, \Dicibi\IndoRegion\Models\District> $districts
 * @property \Illuminate\Database\Eloquent\Collection<int, \Dicibi\IndoRegion\Models\District> $villages
 * @property int|string $idn_province_id
 * @property int $id
 */
class Regency extends Model
{
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setHidden([
            IndoRegion::getForeignKeyId(Feature::Province),
        ]);
    }

    public function getTable(): string
    {
        return IndoRegion::getTable(Feature::Regency);
    }

    /**
     * Get the province that owns the regency.
     *
     * @return Relations\BelongsTo<Province, self>
     */
    public function province(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.province'), IndoRegion::getForeignKeyId(Feature::Province));
    }

    /**
     * Get all the districts for the Regency
     *
     * @return Relations\HasMany<District>
     */
    public function districts(): Relations\HasMany
    {
        return $this->hasMany(config('indoregion.models.district'), IndoRegion::getForeignKeyId(Feature::Regency));
    }

    /**
     * @return Relations\HasManyThrough<Village>
     */
    public function villages(): Relations\HasManyThrough
    {
        return $this->hasManyThrough(
            config('indoregion.models.village'),
            config('indoregion.models.district'),
            IndoRegion::getForeignKeyId(Feature::Regency),
            IndoRegion::getForeignKeyId(Feature::District),
        );
    }
}
