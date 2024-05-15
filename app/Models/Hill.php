<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Hill extends Model
{
    use HasFactory;

    protected $primaryKey = 'hill_id';

    protected $fillable = ['name', 'country', 'city', 'build_year', 'hill_size', 'record', 'record_holder_id'];
    public $timestamps = false;

    public function recordHolder()
    {
        return $this->belongsTo(RecordHolder::class, 'record_holder_id');
    }

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'trip_hills', 'hill_id', 'trip_id');
    }
}
