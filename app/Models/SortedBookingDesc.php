<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SortedBookingDesc extends Model
{
    // Nazwa tabeli, która odpowiada temu modelowi
    protected $table = 'SortedBookingsDesc';
    
    // Wyłączenie automatycznego zarządzania timestamps, jeśli widok ich nie zawiera
    public $timestamps = false;

    // Definicje relacji, jeśli są potrzebne
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}
