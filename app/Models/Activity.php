<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
    'activityName' ,
    'activityPrice',
    'description',
    'openTime',
    'closeTime',
    'locationLang',
    'locationlatitude',
    'category_id',
    'city_id',
];

    public function category()
    {
        return $this->hasOne(Category::class ,"id");
    }
    public function city()
    {
        return $this->hasOne(city::class , "id");
    }
    public function review()
    {
        return $this->hasMany(ReviewActivity::class);
    }

}
