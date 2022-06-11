<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAlbumRequest extends FormRequest
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
            'title' => 'required|string',
            'order' => ['numeric', Rule::unique('albums','order')->ignore($this->id)],
            'number_of_tracks' => 'nullable|numeric',
            'title_id' => 'nullable|exists:titles,id',
            'composer' => 'nullable|exists:composers,id',
            'album_length' => 'nullable|string',
            'date_released' => 'nullable|date'
        ];
    }
}
