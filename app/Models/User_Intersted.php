<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Intersted extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        "interstedsId"
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function intersteds()
    {
        return $this->hasMany(Intersted::class);
    }
}
