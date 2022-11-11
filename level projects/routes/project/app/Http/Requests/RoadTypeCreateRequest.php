<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoadTypeCreateRequest extends FormRequest
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
            'type' => 'required|unique:road_types,type|max:100',
            'delay_factor' => 'required|numeric'
        ];
    }
}
