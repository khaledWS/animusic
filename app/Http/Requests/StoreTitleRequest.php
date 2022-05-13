<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTitleRequest extends FormRequest
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
            'thumbnail' => 'required',
            'title' => 'required|string',
            'order' => ['numeric', Rule::unique('titles','order')],
            'number_of_episodes' =>'numeric',
            'type' => 'in:canon,recap,spinoff,filler,extra',
            'format' => 'in:tv,movie,oda',
            'start_date' => 'date',
            'end_date'=> 'date'
        ];
    }
}
