<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'phone', 'email', 'balance'];
    public $timestamps = false;

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }
}
