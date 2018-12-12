<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class SeatNumberRequest extends FormRequest
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
            'number' => [
                'required',
                'regex:/^[1-5]$/'
            ],
            'site_id' => [
                'required',
                'regex:/^\d+$/'
            ]
        ];
    }
}
