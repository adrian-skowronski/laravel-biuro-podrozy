<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog_posts'; 

    protected $fillable = ['title', 'description', 'photo', 'customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

