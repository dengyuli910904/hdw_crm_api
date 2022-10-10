<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlatUserInfoRequest extends FormRequest
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
        switch ($this->method()){
            case 'GET':
                return [
                    'start_time' => 'date',
                    'end_time' => 'date'
                ];
            case 'POST':
                return [
                    'phone' => 'required|min:11|numeric|unique:plat_user_infos,phone',
                    'username' => 'required'
                ];
        }
    }
}
