<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intersted extends Model
{
    use HasFactory;
    protected $fillable = [
       'intersted_name'
    ];
    public function userIntersed()
    {
        return $this->belongsTo(User_Intersted::class);
    }


}
