<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OsiisCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'Abr' => $this->Abr,
            'diagnosis' => $this->diagnosis,
            'lesions' => $this->lesions()->orderByName()->get()->map->only('id', 'date_event', 'onset', 'when_occurred', 'fixture_minute', 'contact', 'subsequent_cat', 'time_loss'),
        ];
    }
}
