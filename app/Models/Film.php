<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'genre',
        'image',
        'price',
        'top_movie',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
