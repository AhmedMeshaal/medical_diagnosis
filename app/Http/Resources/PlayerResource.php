<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
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
            'spl_id' => $this->spl_id,
            'DOB' => $this->DOB,
            'name' => $this->name,
            'age_bracket' => $this->age_bracket,
            'lesions' => $this->lesions()->orderByName()->get()->map->only('id', 'date_event', 'onset', 'when_occurred', 'fixture_minute', 'contact', 'subsequent_cat', 'time_loss'),
        ];
    }
}
