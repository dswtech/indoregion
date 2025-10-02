<?php

namespace Dswtech\IndoRegion\Tests\Feature;

use Dswtech\IndoRegion\Contracts\IndoRegionResolver;
use Dswtech\IndoRegion\Models\Province;
use Dswtech\IndoRegion\Models\Regency;
use Illuminate\Pagination\CursorPaginator;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertNotEmpty;
use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertTrue;

it('can retrieve province', function () {
    /** @var Regency $regency */
    $regency = Regency::query()->first();

    assertNotEmpty($regency->province);
});

it('can retrieve districts', function () {
    /** @var Regency $regency */
    $regency = Regency::query()->whereHas('districts')->first();

    assertNotEmpty($regency);

    /** @var \Dswtech\IndoRegion\Models\District $district */
    $district = $regency->districts()->first();

    assertSame((int) $district->idn_regency_id, $regency->id);
});

it('can retrieve villages', function () {
    /** @var Regency $regency */
    $regency = Regency::query()->whereHas('villages')->first();

    assertNotEmpty($regency);

    /** @var \Dswtech\IndoRegion\Models\Village $village */
    $village = $regency->villages()->first();

    assertTrue($regency->districts()->where('id', $village->idn_district_id)->exists());
});

it('can retrieve regency from actions', function () {
    // jawa timur
    /** @var Province $province */
    $province = Province::query()->find(35);

    /** @var IndoRegionResolver $action */
    $action = app()->get(IndoRegionResolver::class);

    $pagination = $action->getRegencies($province);

    assertInstanceOf(CursorPaginator::class, $pagination);

    $pagination = $action->getRegencies($province, 'Surabaya');

    assertCount(1, $pagination->items());
});
