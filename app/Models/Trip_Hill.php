<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Trip_Hill extends Model
{
    use HasFactory;

    protected $table = 'trips_hills';

    protected $primaryKey = 'id';

    protected $fillable = ['trip_id', 'hill_id'];
    public $timestamps = false;

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }

    public function hill()
    {
        return $this->belongsTo(Hill::class, 'hill_id');
    }
}

