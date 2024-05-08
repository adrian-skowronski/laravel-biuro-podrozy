<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hill extends Model
{
    protected $fillable = ['name', 'country', 'city', 'build_year', 'hill_size', 'record', 'record_holder'];
}
