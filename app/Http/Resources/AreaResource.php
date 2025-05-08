<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'img' => $this->img ? url()->route('img', ['path' => $this->img, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
