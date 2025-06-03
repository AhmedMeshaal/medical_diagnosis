<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LesionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map->only(
            'id', 'name', 'date_event', 'problem_type', 'onset', 'when_occurred', 'fixture_minute', 'contact', 'contact_type', 'subsequent_cat', 'time_loss', 'area'
        );
    }
}
