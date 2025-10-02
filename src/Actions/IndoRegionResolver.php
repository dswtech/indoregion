<?php

namespace Dswtech\IndoRegion\Actions;

use Dswtech\IndoRegion\Contracts\IndoRegionResolver as IndoRegionResolverContract;
use Dswtech\IndoRegion\Models\District;
use Dswtech\IndoRegion\Models\Province;
use Dswtech\IndoRegion\Models\Regency;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\CursorPaginator;

class IndoRegionResolver implements IndoRegionResolverContract
{
    public function getProvinces(?string $searchQuery = null, ?int $perPage = null): CursorPaginator
    {
        $query = Province::query();

        $query->when(
            $searchQuery,
            static fn (Builder $query, string $input) => $query->where('name', 'like', "%$input%")
        );

        return $query->cursorPaginate($perPage);
    }

    public function getRegencies(Province $province, ?string $searchQuery = null, ?int $perPage = null): CursorPaginator
    {
        $query = $province->regencies();

        $query->when(
            $searchQuery,
            static fn (Builder $query, string $input) => $query->where('name', 'like', "%$input%")
        );

        return $query->cursorPaginate($perPage);
    }

    public function getDistricts(Regency $regency, ?string $searchQuery = null, ?int $perPage = null): CursorPaginator
    {
        $query = $regency->districts();

        $query->when(
            $searchQuery,
            static fn (Builder $query, string $input) => $query->where('name', 'like', "%$input%")
        );

        return $query->cursorPaginate($perPage);
    }

    public function getVillages(District $district, ?string $searchQuery = null, ?int $perPage = null): CursorPaginator
    {
        $query = $district->villages();

        $query->when(
            $searchQuery,
            static fn (Builder $query, string $input) => $query->where('name', 'like', "%$input%")
        );

        return $query->cursorPaginate($perPage);
    }
}
