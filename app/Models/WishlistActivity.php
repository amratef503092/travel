<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistActivity extends Model
{

    use HasFactory;
    protected $table = 'wishlist_activity';

    protected $fillable = [
        'user_id',
        'activities_id'
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activities_id');
    }
}
