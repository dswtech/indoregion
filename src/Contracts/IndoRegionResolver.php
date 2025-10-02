<?php

namespace Dswtech\IndoRegion\Contracts;

use Dswtech\IndoRegion\Models\District;
use Dswtech\IndoRegion\Models\Province;
use Dswtech\IndoRegion\Models\Regency;
use Dswtech\IndoRegion\Models\Village;
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
