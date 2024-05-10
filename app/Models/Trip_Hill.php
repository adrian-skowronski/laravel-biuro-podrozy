<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Trip_Hill extends Model
{
    use HasFactory;

    protected $table = 'trips_hills';

    protected $fillable = ['trip_id', 'hill_id'];
    public $timestamps = false;
}
