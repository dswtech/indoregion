<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dicibi\IndoRegion\Models;

use Dicibi\IndoRegion\IndoRegion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

/**
 * Regency Model.
 *
 * @property  string $name
 * @property  \Dicibi\IndoRegion\Models\Province $province
 * @property  \Illuminate\Database\Eloquent\Collection<int, \Dicibi\IndoRegion\Models\District> $districts
 * @property  \Illuminate\Database\Eloquent\Collection<int, \Dicibi\IndoRegion\Models\District> $villages
 * @property  int|string $province_id
 * @property  int $id
 */
class Regency extends Model
{

    public $timestamps = false;

    protected $hidden = [
        'province_id',
    ];

    public function getTable(): string
    {
        return IndoRegion::getRegencyTable();
    }

    public function province(): Relations\BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function districts(): Relations\HasMany
    {
        return $this->hasMany(District::class);
    }

    public function villages(): Relations\HasManyThrough
    {
        return $this->hasManyThrough(Village::class, District::class);
    }
}
