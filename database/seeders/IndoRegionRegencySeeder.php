<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dswtech\IndoRegion\Database\Seeders;

use Dswtech\IndoRegion\Models\Regency;
use Dswtech\IndoRegion\RawDataGetter;
use Illuminate\Database\Seeder;

class IndoRegionRegencySeeder extends Seeder
{
    public function run(): void
    {
        // Get Data
        $regencies = RawDataGetter::getRegencies();

        // Insert Data to Database
        foreach ($regencies as $regency) {
            Regency::query()->insert($regency);
        }
    }
}
