<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListUserHotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'hotel_info_id',
    ];
    public function hotel()
    {
        return $this->belongsTo(HotelInfo::class , "hotel_info_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }

}
