<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SortedBookingAsc extends Model
{
  
    protected $table = 'SortedBookingsAsc';
    
 
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
