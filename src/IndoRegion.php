<?php

namespace Dicibi\IndoRegion;

use Dicibi\IndoRegion\Enums\Feature;
use Illuminate\Database\Schema\Blueprint;

final class IndoRegion
{
    // table prefixed with idn (Indonesia) in ISO 3166-1 alpha-3

    protected static string $provinceTable = 'idn_provinces';

    protected static string $regencyTable = 'idn_regencies';

    protected static string $districtTable = 'idn_districts';

    protected static string $villageTable = 'idn_villages';

    protected static string $foreignProvinceId = 'idn_province_id';

    protected static string $foreignRegencyId = 'idn_regency_id';

    protected static string $foreignDistrictId = 'idn_district_id';

    protected static string $foreignVillageId = 'idn_village_id';

    /**
     * @param  array<\Dicibi\IndoRegion\Enums\Feature>  $features
     */
    public static function tables(
        Blueprint $table,
        array $features = [
            Enums\Feature::Province,
            Enums\Feature::Regency,
            Enums\Feature::District,
            Enums\Feature::Village,
        ]
    ): void {
        if (in_array(Enums\Feature::Province, $features, true)) {
            $table->foreignId(self::getForeignKeyId(Feature::Province))
                ->nullable()
                ->constrained()
                ->references('id')
                ->on(self::getTable(Feature::Province));
        }

        if (in_array(Enums\Feature::Regency, $features, true)) {
            $table->foreignId(self::getForeignKeyId(Feature::Regency))
                ->nullable()
                ->constrained()
                ->references('id')
                ->on(self::getTable(Feature::Regency));
        }

        if (in_array(Enums\Feature::District, $features, true)) {
            $table->foreignId(self::getForeignKeyId(Feature::District))
                ->nullable()
                ->constrained()
                ->references('id')
                ->on(self::getTable(Feature::District));
        }

        if (in_array(Enums\Feature::Village, $features, true)) {
            $table->foreignId(self::getForeignKeyId(Feature::Village))
                ->nullable()
                ->constrained()
                ->references('id')
                ->on(self::getTable(Feature::Village));
        }
    }

    public static function getTable(Feature $feature): string
    {
        return match ($feature) {
            Enums\Feature::Province => self::$provinceTable,
            Enums\Feature::Regency => self::$regencyTable,
            Enums\Feature::District => self::$districtTable,
            Enums\Feature::Village => self::$villageTable,
        };
    }

    public static function getForeignKeyId(Feature $feature): string
    {
        return match ($feature) {
            Enums\Feature::Province => self::$foreignProvinceId,
            Enums\Feature::Regency => self::$foreignRegencyId,
            Enums\Feature::District => self::$foreignDistrictId,
            Enums\Feature::Village => self::$foreignVillageId,
        };
    }

    public static function setTable(Feature $feature, string $name): void
    {
        switch ($feature) {
            case Enums\Feature::Province:
                self::$provinceTable = $name;
                break;
            case Enums\Feature::Regency:
                self::$regencyTable = $name;
                break;
            case Enums\Feature::District:
                self::$districtTable = $name;
                break;
            case Enums\Feature::Village:
                self::$villageTable = $name;
                break;
        }
    }

    public static function setForeignKeyId(Feature $feature, string $name): void
    {
        switch ($feature) {
            case Enums\Feature::Province:
                self::$foreignProvinceId = $name;
                break;
            case Enums\Feature::Regency:
                self::$foreignRegencyId = $name;
                break;
            case Enums\Feature::District:
                self::$foreignDistrictId = $name;
                break;
            case Enums\Feature::Village:
                self::$foreignVillageId = $name;
                break;
        }
    }
}
