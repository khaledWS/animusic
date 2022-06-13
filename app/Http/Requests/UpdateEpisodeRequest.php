<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEpisodeRequest extends FormRequest
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
            'jp_title' => 'string',
            'romaji_title' => 'string',
            'title_id' => 'nullable|exists:titles,id',
            'season_number' => ['numeric', Rule::unique('episodes', 'season_number')->ignore($this->id)],
            'series_number' => ['numeric', Rule::unique('episodes', 'series_number')->ignore($this->id)],
            'episode_length' => 'nullable'
        ];
    }
}
