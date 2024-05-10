<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Record_holder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'country'];
    public $timestamps = false;

    public function hills()
    {
        return $this->hasMany(Hill::class, 'record_holder_id');
    }
}
