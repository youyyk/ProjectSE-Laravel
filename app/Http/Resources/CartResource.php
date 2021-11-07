<?php

namespace App\Http\Resources;

use App\Models\Restable;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            "id" => $this->id,
            "restable_id" => new ResTableResource(Restable::findOrFail($this->restable_id)),
            "created_at"=> $this->created_at->format('j M Y'),
            "updated_at"=> $this->updated_at->format('j M Y'),
        ];
    }
}
