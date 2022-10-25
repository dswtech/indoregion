<?php

/** @noinspection PhpUnhandledExceptionInspection */

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Dicibi\IndoRegion;

use Iterator;
use League\Csv\Reader;

class RawDataGetter
{
    protected static string $path = __DIR__.'/../database/data/csv/';

    public static function getProvinces(): Iterator
    {
        return self::getCsvData(self::$path.'provinces.csv');
    }

    public static function getRegencies(): Iterator
    {
        return self::getCsvData(self::$path.'regencies.csv');
    }

    public static function getDistricts(): Iterator
    {
        return self::getCsvData(self::$path.'districts.csv');
    }

    public static function getVillages(): Iterator
    {
        return self::getCsvData(self::$path.'villages.csv');
    }

    public static function getCsvData(string $path): Iterator
    {
        $csv = Reader::createFromPath($path);
        $csv->setHeaderOffset(0);

        return $csv->getRecords();
    }
}
