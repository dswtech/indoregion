<?php

namespace Dicibi\IndoRegion\Tests;

use Dicibi\IndoRegion\Database\Seeders\IndoRegionSeeder;
use Dicibi\IndoRegion\IndoRegionServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\Attributes\WithConfig;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

use function Orchestra\Testbench\workbench_path;

#[WithConfig('app.key', 'base64:tXaZmfbKgk04ki71jcfxlGZAeEZxMMMPZYrdNcokYeM='), WithConfig('database.default', 'testing')]
class TestCase extends TestbenchTestCase
{
    use RefreshDatabase;

    public bool $seed = true;

    public string $seeder = IndoRegionSeeder::class;

    protected function getPackageProviders($app): array
    {
        return [
            IndoRegionServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(workbench_path('migrations'));
    }
}
