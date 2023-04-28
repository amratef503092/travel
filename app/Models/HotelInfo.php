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
       $review =  $this->hasMany(ReviewHotel::class , "Hotel_id");
        return  $review;
    }
    public function room()
    {
        return $this->hasMany(Room::class);
    }
    public function hotelManager()
    {
        return $this->belongsTo(hotels::class);
    }
}
