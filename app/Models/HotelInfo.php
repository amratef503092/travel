<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelInfo extends Model
{
    use HasFactory;
    protected $casts = [
        'images' => 'array',
        'location' => 'array',
        'OPTIONS' => 'array'
    ];
    public function reviewHotel()
    {
        return $this->hasMany(ReviewHotel::class);
    }
    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
