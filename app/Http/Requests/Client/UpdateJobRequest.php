<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'height' => 'required|string|max:10',
            'weight' => 'required|string|max:10',
            'chest' => 'required|string|max:10',
            'hair_color' => 'required|string|max:150',
            'hair_style' => 'required|string|max:150',
            'eyes_color' => 'required|string|max:150',
            'hips' => 'required|string|max:10',
            'size' => 'required|string|max:10',
            'waist' => 'required|string|max:10',
            'skin_color' => 'required|string|max:150',
            'hair_cut' => 'required|string|max:150',
            'tattoo' => 'required',
            'title' => 'required',
            'description' => 'required',
            'remuneration' => 'required|numeric|min:0',
        ];
    }
}
