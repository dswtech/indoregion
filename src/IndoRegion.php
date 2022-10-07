<?php

namespace Dicibi\IndoRegion;

use Illuminate\Database\Schema\Blueprint;

class IndoRegion
{
    // table prefixed with idn (Indonesia) in ISO 3166-1 alpha-3

    protected static string $provinceTable = 'idn_provinces';
    protected static string $regencyTable = 'idn_regencies';
    protected static string $districtTable = 'idn_districts';
    protected static string $villageTable = 'idn_villages';

    /**
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @param array<\Dicibi\IndoRegion\Enums\Feature> $features
     * @return void
     */
    public static function tables(Blueprint $table, array $features = []): void
    {
        if (in_array(Enums\Feature::Province, $features)) {
            $table->foreignId('province_id')->constrained()->references('id')->on('provinces');
        }

        if (in_array(Enums\Feature::Regency, $features)) {
            $table->foreignId('regency_id')->constrained()->references('id')->on('regencies');
        }

        if (in_array(Enums\Feature::District, $features)) {
            $table->foreignId('district_id')->constrained()->references('id')->on('districts');
        }

        if (in_array(Enums\Feature::Village, $features)) {
            $table->foreignId('village_id')->constrained()->references('id')->on('villages');
        }
    }

    /**
     * @return string
     */
    public static function getProvinceTable(): string
    {
        return self::$provinceTable;
    }

    /**
     * @param string $provinceTable
     */
    public static function setProvinceTable(string $provinceTable): void
    {
        self::$provinceTable = $provinceTable;
    }

    /**
     * @return string
     */
    public static function getRegencyTable(): string
    {
        return self::$regencyTable;
    }

    /**
     * @param string $regencyTable
     */
    public static function setRegencyTable(string $regencyTable): void
    {
        self::$regencyTable = $regencyTable;
    }

    /**
     * @return string
     */
    public static function getDistrictTable(): string
    {
        return self::$districtTable;
    }

    /**
     * @param string $districtTable
     */
    public static function setDistrictTable(string $districtTable): void
    {
        self::$districtTable = $districtTable;
    }

    /**
     * @return string
     */
    public static function getVillageTable(): string
    {
        return self::$villageTable;
    }

    /**
     * @param string $villageTable
     */
    public static function setVillageTable(string $villageTable): void
    {
        self::$villageTable = $villageTable;
    }
}