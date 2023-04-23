<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            "activityName" =>$this->activityName,
            "activityPrice" =>$this->activityPrice,
            "description" =>$this->description,
            "openTime" =>$this->openTime,
            "closeTime" =>$this->closeTime,
            "locationLang" =>$this->locationLang,
            "locationlatitude" =>$this->locationlatitude,
            "review"=>$this->review,
            "category"=>$this->category,
            "city"=>$this->city,

        ];
    }
}
