<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LesionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'area_id' => ['nullable', Rule::exists('areas', 'id')],
            'date_event' => ['required', 'string'],
            'onset' => ['required', 'string'],
            'when_occurred' => ['required', 'string'],
            'fixture_minute' => ['required', 'numeric'],
            'contact' => ['required', 'string'],
            'contacttype_id' => ['nullable', Rule::exists('contact_types', 'id')],
            'subsequent_cat' => ['required', 'string'],
            'time_loss' => ['required', 'string'],
            'illness_id' => ['nullable', Rule::exists('illnesses', 'id')],
            'playeraction_id' => ['nullable', Rule::exists('player_actions', 'id')],
            'osiiscode_id' => ['nullable', Rule::exists('osiis_codes', 'id')],
            'player_id' => ['nullable', Rule::exists('players', 'id')],
            'pathologytype_id' => ['nullable', Rule::exists('pathology_types', 'id')],
        ];
    }
}
