<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsRequest extends FormRequest
{
    public function rules()
    {
        switch (request()->getMethod()) {
            case 'PUT':
                return [
                    'name'      => 'required|string|max:191',
                    'user_id'   => 'required|numeric|min:1',
                    'level'     => 'required|string|max:100',
                    'time'      => 'required|string|max:100',
                    'distance'  => 'required|string|max:100',
                    
                ];
            case 'POST':
                return [
                    'name'      => 'required|string|max:191',
                    'user_id'   => 'required|numeric|min:1',
                    'level'     => 'required|string|max:100',
                    'time'      => 'required|string|max:100',
                    'distance'  => 'required|string|max:100',

                    
                ];
            case 'GET':
                return [
                    'id'        => 'numeric|min:1',
                    'name'      => 'required|string|max:191',
                    'user_id'   => 'required|numeric|min:1',
                    'level'     => 'required|string|max:100',
                    'time'      => 'required|string|max:100',
                    'distance'  => 'required|string|max:100',
                ];
            case 'DELETE':
                return [
                    'id'        => 'numeric|min:1'
                ];
            default:
                return [];
        }
    }
}