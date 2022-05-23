<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEpisodeTrackRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'episode_id' => 'nullable|exists:episodes,id',
            'track_id'  => 'nullable|exists:tracks,id',
            'start' => 'required',
            'end' => 'required',
            'notes' => 'nullable|string'
        ];
    }
}
