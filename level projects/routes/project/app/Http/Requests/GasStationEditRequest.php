<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GasStationEditRequest extends FormRequest
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
            'name' => 'required|max:100',
            'city_id' => 'required',
            'distance_to_city' => 'nullable|numeric',
            'diesel' => 'nullable|numeric',
            'gasoline' => 'nullable|numeric',
            'gas' => 'nullable|numeric',
            'methane' => 'nullable|numeric',
            'electricity' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return [
            'city_id.required' => 'The city field is required!'
        ];
    }
}
