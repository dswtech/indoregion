<?php

use Dicibi\IndoRegion\IndoRegion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dummies', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            IndoRegion::tables($table);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::drop('dummies');
    }
};
