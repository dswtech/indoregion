<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dswtech\IndoRegion\Database\Seeders;

use Dswtech\IndoRegion\Models\Province;
use Dswtech\IndoRegion\RawDataGetter;
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
