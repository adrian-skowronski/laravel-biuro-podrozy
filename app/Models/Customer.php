<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Customer as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'balance',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isAdmin() : bool {
        // $admin_role = Cache::rememberForever('admin_role', function () {
        //     return DB::table('roles')->where('name', 'admin')->value('id');
        // });

        //return $this->role_id == $admin_role;

        return $this->role_id == 1;
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }
    
}
