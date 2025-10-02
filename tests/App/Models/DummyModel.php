<?php

namespace Dswtech\IndoRegion\Tests\App\Models;

use Dswtech\IndoRegion\Concerns\HasIndonesiaRegionData;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 */
class DummyModel extends Model
{
    use HasIndonesiaRegionData;

    protected $table = 'dummies';
}
