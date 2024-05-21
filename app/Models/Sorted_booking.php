<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorted_Booking extends Model
{
    protected $table = 'sorted_bookings';

    // Jeśli nie ma kolumny id w widoku, ustaw $primaryKey i $incrementing:
    protected $primaryKey = 'booking_id';
    public $incrementing = false;

    // Jeśli nie chcesz zarządzania znacznikami czasu przez Eloquent:
    public $timestamps = false;

    // Definicje relacji
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}