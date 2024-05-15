<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Coordinator extends Model
{
    use HasFactory;
    protected $primaryKey = 'coordinator_id';

    protected $fillable = ['name', 'surname'];
    public $timestamps = false;

    public function trips()
    {
        return $this->hasMany(Trip::class, 'trip_id');
    }
}
