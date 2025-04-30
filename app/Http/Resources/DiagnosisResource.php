<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosisResource extends JsonResource
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
            'injure' => $this->injure,
            'description' => $this->description,
            'symptoms' => $this->symptoms,
            'sign' => $this->sign,
            'contact' => $this->contacts()->orderByName()->get()->map->only('id', 'name', 'city', 'phone'),
        ];
    }
}
