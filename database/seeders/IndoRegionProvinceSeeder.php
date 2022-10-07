<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dicibi\IndoRegion\Database\Seeders;

use Dicibi\IndoRegion\Models\Province;
use Dicibi\IndoRegion\RawDataGetter;
use Illuminate\Database\Seeder;

class IndoRegionProvinceSeeder extends Seeder
{
    public function run(): void
    {
        // Get Data
        $provinces = RawDataGetter::getProvinces();

        // Insert Data to Database
        foreach ($provinces as $province) {
            Province::query()->insert($province);
        }
    }
}
