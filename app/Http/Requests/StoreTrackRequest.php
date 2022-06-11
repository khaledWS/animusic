<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrackRequest extends FormRequest
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
            'album_id' => 'nullable|exists:albums,id',
            'composer_id'  => 'nullable|exists:composers,id',
            'length' => 'nullable|string',
            'disk' => 'nullable|numeric',
            'order' => ['nullable','numeric', Rule::unique('tracks','order')->where(function ($query){
                return $query->where('album_id', $this->album_id)->where('disk',$this->disk);
            })],
            'yt_unofficial' => 'string|nullable',
            'spotify' => 'string|nullable',
            'yt_official' => 'string|nullable',
            'notes' => 'string|nullable',
        ];
    }
}
