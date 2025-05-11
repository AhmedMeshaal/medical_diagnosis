<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AreaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(fn ($area) => [
            'id' => $area->id,
            'name' => $area->name,
            'img' => $area->img ? url()->route('image', ['path' => $area->img, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
            'deleted_at' => $area->deleted_at,
        ]);
    }
}
