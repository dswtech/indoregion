<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dicibi\IndoRegion\Database\Seeders;

use Dicibi\IndoRegion\Models\District;
use Dicibi\IndoRegion\RawDataGetter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class IndoRegionDistrictSeeder extends Seeder
{
    public function run(): void
    {
        // Get Data
        $districts = RawDataGetter::getDistricts();

        // Insert Data to Database
        collect($districts)->chunk(100)->each(function (Collection $chunk) {
            District::query()->insert($chunk->toArray());
        });
    }
}
