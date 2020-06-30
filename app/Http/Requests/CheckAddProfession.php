<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckAddProfession extends FormRequest
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

    public function messages()
    {
        return [
            'pName.unique' => 'Profession already exists',
        ];
    }

    public function rules()
    {
        return [
            'pName' => 'unique:professions,pr_name',
        ];
    }
}
