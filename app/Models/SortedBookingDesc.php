<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SortedBookingDesc extends Model
{
    
    protected $table = 'SortedBookingsDesc';
    

    public $timestamps = false;


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}
