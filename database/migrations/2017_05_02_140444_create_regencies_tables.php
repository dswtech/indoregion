<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

use Dicibi\IndoRegion\Enums\Feature;
use Dicibi\IndoRegion\IndoRegion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(IndoRegion::getTable(Feature::Regency), static function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->foreignId(IndoRegion::getForeignKeyId(Feature::Province))
                ->constrained(IndoRegion::getTable(Feature::Province))
                ->cascadeOnUpdate();
            $table->string('name', 50);
        });
    }

    public function down(): void
    {
        Schema::drop(IndoRegion::getTable(Feature::Regency));
    }
};
