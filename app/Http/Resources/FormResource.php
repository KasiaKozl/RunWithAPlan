<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

//Transformation layer that decides which data will be displayed for the user
class FormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id'   =>$this->userId,
            'level'     =>$this->level,
            'time'      =>$this->time,
            'distance'  =>$this->distance
        ];
    }
}
