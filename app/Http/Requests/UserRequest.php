<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//Defining the rules that every request should respect, grouped by methods
class UserRequest extends FormRequest
{
    public function rules()
    {
        switch (request()->getMethod()) {
            case 'PUT':
                return [
                    'name'          => 'required|string|max:191',
                    'password'      => 'required|password|confirmed|min:8|max:191',
                    'email'         => 'required|email|unique|max:191',
                    'phone'         => 'required|phone|unique|max:12',
                    'planning_id'   => 'required|numeric|min:1',
                    'type'          => 'required|numeric|min:1'
                    
                ];
            case 'POST':
                return [
                    'name'          => 'required|string|max:191',
                    'password'      => 'required|password|confirmed|min:8|max:191',
                    'email'         => 'required|email|unique|max:191',
                    'phone'         => 'required|phone|unique|max:12',
                    'planning_id'   => 'required|numeric|min:1',
                    'type'          => 'required|numeric|min:1'
                    
                    
                ];
            case 'GET':
                return [
                    'id'            => 'numeric|min:1',
                    'name'          => 'required|string|max:191',
                    'password'      => 'required|password|confirmed|min:8|max:191',
                    'email'         => 'required|email|unique|max:191',
                    'phone'         => 'required|phone|unique|max:12',
                    'planning_id'   => 'required|numeric|min:1',
                    'type'          => 'required|numeric|min:1'
                ];
            case 'DELETE':
                return [
                    'id'            => 'numeric|min:1'
                ];
            default:
                return [];
        }
    }
}