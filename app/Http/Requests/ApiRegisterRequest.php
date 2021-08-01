<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRegisterRequest extends FormRequest
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
     */public function rules()
{
    return [
        'userName' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'organizationNumber' => 'required|max:10|min:10',
        'organizationAddress' => 'required',
        'organizationName' => 'required'
        ];
    }
}
