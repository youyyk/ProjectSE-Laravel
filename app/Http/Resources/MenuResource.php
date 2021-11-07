<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            "id"=> $this->id,
            "name"=> $this->name,
            "price"=> $this->price,
            "category"=>$this->category,
            "department" => [
                'id' => $this->department->id,
                'name' => $this->department->name,
            ],
            "processTime"=> $this->processTime,
            "created_at"=> $this->created_at->format('j M Y'),
            "updated_at"=> $this->updated_at->format('j M Y'),
        ];

    }
}
