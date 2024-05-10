<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'date', 'status', 'trip_id', 'participants'];
    public $timestamps = false;

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function trips()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}
