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
            'length' => 'required|string',
            'disk' => 'numeric',
            'order' => ['numeric', Rule::unique('tracks','order')->where(function ($query){
                return $query->where('album_id', $this->album_id)->where('disk',$this->disk);
            })],
            'notes' => 'string|nullable',
            'album_id' => 'nullable|exists:albums,id'
        ];
    }
}
