<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistHotel extends Model
{
    use HasFactory;
    protected $table = 'wishlist_hotel';
    protected $fillable = [
        'user_id',
        'hotel_info_id'
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }
    public function hotelInfo()
    {
        return $this->belongsTo(HotelInfo::class, 'hotel_info_id');
    }

}
