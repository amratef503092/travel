<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelInfoResource extends JsonResource
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
            "id"=>$this->id,
            "review"=> ReviewHotelResource::collection($this->reviewHotel),
            "hotel_name"=>$this->hotel_name,
            "images"=>$this->images,
            "location"=>$this->location,
            "OPTIONS"=>$this->OPTIONS,
            "type_of_room"=>$this->type_of_room,
            "city_id"=>$this->city_id,



           ];
    }
}
