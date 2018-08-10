<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'img' => 'image|nullable',
            'location' => 'required',
            'gender' => 'required',
            'height' => 'required|integer|between:120,220',
            'weight' => 'required|integer|between:40,140',
            'chest' => 'required|integer|between:65,195',
            'hair_color' => 'required|string|max:150',
            'hair_style' => 'required|string|max:150',
            'eyes_color' => 'required|string|max:150',
            'hips' => 'required|integer|between:78,135',
            'size' => 'required|integer|between:35,51',
            'waist' => 'required|integer|between:65,160',
            'skin_color' => 'required|string|max:150',
            'hair_cut' => 'required|string|max:150',
            'tattoo' => 'required',
        ];
    }
}
