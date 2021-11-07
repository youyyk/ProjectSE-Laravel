<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            "id" => $this->id,
            "restable_id" => new ResTableResource($this->restable),
            "user_id" => new UserResource($this->user),
            "total" => $this->total,
            "type" => $this->type,
            "status" => $this->status,
            "paid" => $this->paid,
            "created_at"=> $this->created_at->format('j M Y'),
            "updated_at"=> $this->updated_at->format('j M Y'),
        ];
    }
}
