<?php

namespace Dicibi\IndoRegion\Contracts;

use Dicibi\IndoRegion\Models\District;
use Dicibi\IndoRegion\Models\Province;
use Dicibi\IndoRegion\Models\Regency;
use Dicibi\IndoRegion\Models\Village;
use Illuminate\Contracts\Pagination\CursorPaginator;

interface IndoRegionResolver
{
    /**
     * @return CursorPaginator<int, Province>
     */
    public function getProvinces(?string $searchQuery = null): CursorPaginator;

    /**
     * @return CursorPaginator<int, Regency>
     */
    public function getRegencies(Province $province, ?string $searchQuery = null): CursorPaginator;

    /**
     * @return CursorPaginator<int, District>
     */
    public function getDistricts(Regency $regency, ?string $searchQuery = null): CursorPaginator;

    /**
     * @return CursorPaginator<int, Village>
     */
    public function getVillages(District $district, ?string $searchQuery = null): CursorPaginator;
}
