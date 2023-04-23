<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedActivity extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "activity_id",
        "user_id",
        "date",
        "total_price",
    ];
    public function user()
    {
      return  $this->belongsTo(User::class , "id");
    }
    public function activity()
    {
        return   $this->belongsTo(Activity::class,'id');
    }

}
