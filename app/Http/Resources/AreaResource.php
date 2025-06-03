<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lesions' => $this->lesions()->orderByName()->get()->map->only('id', 'date_event', 'onset', 'when_occurred', 'fixture_minute', 'contact', 'subsequent_cat', 'time_loss'),
        ];
    }
}
