<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Trip extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'trip_id';

    protected $fillable = ['title', 'start', 'end', 'price', 'description', 'max_participants',
                            'current_participants', 'coordinator_id', 'status', 'photo'];
    public $timestamps = false;

    
    public function hills()
    {
        return $this->belongsToMany(Hill::class, 'trips_hills', 'trip_id', 'hill_id');
    }
    

    public function coordinators()
    {
        return $this->belongsTo(Coordinator::class, 'coordinator_id');
    }
}
