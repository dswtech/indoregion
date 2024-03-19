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
use League\Csv\Exception;
use League\Csv\Reader;
use League\Csv\UnavailableStream;

class RawDataGetter
{
    protected static string $path = __DIR__.'/../database/data/csv/';

    /**
     * @return Iterator<int, array{id: string, name: string}>
     */
    public static function getProvinces(): Iterator
    {
        return self::getCsvData(self::$path.'provinces.csv');
    }

    /**
     * @return Iterator<int, array{id: string, name: string, idn_province_id: string}>
     */
    public static function getRegencies(): Iterator
    {
        return self::getCsvData(self::$path.'regencies.csv');
    }

    /**
     * @return Iterator<int, array{id: string, name: string, idn_regency_id: string}>
     */
    public static function getDistricts(): Iterator
    {
        return self::getCsvData(self::$path.'districts.csv');
    }

    /**
     * @return Iterator<int, array{id: string, name: string, idn_district_id: string}>
     */
    public static function getVillages(): Iterator
    {
        return self::getCsvData(self::$path.'villages.csv');
    }

    /**
     * @return Iterator<int, array<string, string>>
     *
     * @throws Exception
     * @throws UnavailableStream
     */
    public static function getCsvData(string $path): Iterator
    {
        $csv = Reader::createFromPath($path);
        $csv->setHeaderOffset(0);

        return $csv->getRecords();
    }
}
