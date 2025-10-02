<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dswtech\IndoRegion\Database\Seeders;

use Dswtech\IndoRegion\Models\Village;
use Dswtech\IndoRegion\RawDataGetter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class IndoRegionVillageSeeder extends Seeder
{
    public function run(): void
    {
        // Get Data
        $villages = RawDataGetter::getVillages();

        // Insert Data with Chunk
        collect($villages)->chunk(100)->each(function (Collection $chunk) {
            Village::query()->insert($chunk->toArray());
        });
    }
}
