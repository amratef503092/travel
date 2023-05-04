<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
     protected
    $casts = [
    'images' => 'array',
];
protected $fillable =
[
    "Hotel_id",
    "numnberOfBeds",
    "booked",
    "priceperDay",
    "images",
    "descripions"
];
    use HasFactory;
    public function hotles(){
     return   $this->belongsTo(HotelInfo::class,"Hotel_id");
    }
}
