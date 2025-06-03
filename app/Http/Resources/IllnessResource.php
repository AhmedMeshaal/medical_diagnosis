<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IllnessResource extends JsonResource
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
            'illness_name' => $this->illness_name,
            'lesions' => $this->lesions()->orderByName()->get()->map->only('id', 'date_event', 'onset', 'when_occurred', 'fixture_minute', 'contact', 'subsequent_cat', 'time_loss'),
        ];
    }
}
