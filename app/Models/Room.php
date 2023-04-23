<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{ protected $casts = [
    'images' => 'array',
];
    use HasFactory;
    public function hotles(){
     return   $this->belongsTo(HotelInfo::class,"id");
    }
}
