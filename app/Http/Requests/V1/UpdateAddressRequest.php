<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'street'=>'sometimes|required|string',
            'city'=>'sometimes|required|string',
            'state'=>'sometimes|required|string',
            'country'=>'sometimes|required|string',
            'zip_code'=>'sometimes|required|string'
        ];
    }
}
