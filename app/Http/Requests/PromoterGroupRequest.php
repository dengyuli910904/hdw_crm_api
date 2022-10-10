<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoterGroupRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
                return [];
            case 'POST':
                return [
                    'name' => 'required|string|unique:promote_groups,name',
                    'url' => 'required|url|unique:promote_groups,url',
                    'members_count' => 'required|integer|min:1',
                    'active_members' => 'required|integer|min:0',
                    'status' => 'in:0,1'
                ];
            case 'PUT':
                return [
                    'id' => 'required|integer|min:1|exists:promote_groups,id',
                    'url' => 'required|url',
                    'members_count' => 'required|integer|min:1',
                    'active_members' => 'required|integer|min:0',
                    'status' => 'in:0,1'
                ];
            case 'DELETE':
                return [
                    'id' => 'required|integer|min:1|exists:promote_groups,id',
                ];
        }
    }
}
