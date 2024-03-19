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
 * Village Model.
 *
 * @property string $name
 * @property \Dicibi\IndoRegion\Models\District $district
 * @property int|string $idn_district_id
 * @property int $id
 */
class Village extends Model
{
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setHidden([
            IndoRegion::getForeignKeyId(Feature::District),
        ]);
    }

    public function getTable(): string
    {
        return IndoRegion::getTable(Feature::Village);
    }

    /**
     * Get the district that owns the village.
     *
     * @return Relations\BelongsTo<District, self>
     */
    public function district(): Relations\BelongsTo
    {
        return $this->belongsTo(config('indoregion.models.district'), IndoRegion::getForeignKeyId(Feature::District));
    }
}
