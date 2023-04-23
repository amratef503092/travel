<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewHotel extends Model
{
    use HasFactory;
    public function hotelInfo()
    {
        return $this->belongsTo(HotelInfo::class,'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'id');
    }
}
