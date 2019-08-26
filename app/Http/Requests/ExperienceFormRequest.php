<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceFormRequest extends FormRequest
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

            'company' => 'required|string',

            'position' => 'required|string',

            'summary' => 'required|string',

            'location' => 'required|string',

            'current_employee' => 'nullable|boolean',

            'completion_date' => 'nullable|string',

            'start_date' => 'required|string',
        ];
    }
}
