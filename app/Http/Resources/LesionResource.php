<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LesionResource extends JsonResource
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
            'date_event' => $this->date_event,
            'problem_type' => $this->problem_type,
            'onset' => $this->onset,
            'when_occurred' => $this->when_occurred,
            'fixture_minute' => $this->fixture_minute,
            'contact' => $this->contact,
            'contact_type' => $this->contact_type,
            'subsequent_cat' => $this->subsequent_cat,
            'time_loss' => $this->time_loss,
            'area_id' => $this->area_id,
            'player_id' => $this->player_id,
            'playeraction_id' => $this->playeraction_id,
            'illness_id' => $this->illness_id,
            'osiiscode_id' => $this->osiiscode_id,
            'contacttype_id' => $this->contacttype_id,
            'pathologytype_id' => $this->pathologytype_id,
        ];
    }
}
