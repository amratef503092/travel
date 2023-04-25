<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Intersted extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        "interstedsId"
    ];
    public function user()
    {
        return $this->belongsTo(User::class , "userID");
    }
    public function intersted()
    {
        return $this->belongsTo(Intersted::class , 'interstedsId');
    }
}
