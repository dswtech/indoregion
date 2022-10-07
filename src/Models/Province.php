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
 * Province Model.
 *
 * @property  string $name
 * @property  \Illuminate\Database\Eloquent\Collection<int, \Dicibi\IndoRegion\Models\Regency> $regencies
 * @property  \Illuminate\Database\Eloquent\Collection<int, \Dicibi\IndoRegion\Models\District> $districts
 * @property  int $id
 */
class Province extends Model
{
    public $timestamps = false;

    public function getTable(): string
    {
        return IndoRegion::getProvinceTable();
    }

    public function regencies(): Relations\HasMany
    {
        return $this->hasMany(Regency::class);
    }

    public function districts(): Relations\HasManyThrough
    {
        return $this->hasManyThrough(District::class, Regency::class);
    }
}
