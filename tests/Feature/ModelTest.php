<?php

use Dicibi\IndoRegion\Models\Province;
use Dicibi\IndoRegion\Tests\App\Models\DummyModel;

it('can save dummy with all data', function () {
    // get region data
    /** @var \Dicibi\IndoRegion\Models\Province $province */
    $province = Province::query()->first();
    /** @var \Dicibi\IndoRegion\Models\Regency $regency */
    $regency = $province->regencies()->first();
    /** @var \Dicibi\IndoRegion\Models\District $district */
    $district = $regency->districts()->first();
    /** @var \Dicibi\IndoRegion\Models\Village $village */
    $village = $district->villages()->first();

    $dummy = new DummyModel();
    $dummy->name = 'Dummy';
    $dummy->province()->associate($province);
    $dummy->regency()->associate($regency);
    $dummy->district()->associate($district);
    $dummy->village()->associate($village);
    $dummy->save();

    $this->assertDatabaseHas('dummies', [
        'name' => 'Dummy',
        'idn_province_id' => $province->id,
        'idn_regency_id' => $regency->id,
        'idn_district_id' => $district->id,
        'idn_village_id' => $village->id,
    ]);
});
