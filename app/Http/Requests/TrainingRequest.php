<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//Defining the rules that every request should respect, grouped by methods
class TrainingRequest extends FormRequest
{
    public function rules()
    {
        switch (request()->getMethod()) {
            case 'PUT':
                return [
                    'level'      => 'required|string|max:191',
                    'distance'   => 'required|string|max:191',
                    'time'       => 'required|string|max:191',
                    'file_name'  => 'required|mimes:pdf|max:1000',
                    
                ];
            case 'POST':
                return [
                    'level'      => 'required|string|max:191',
                    'distance'   => 'required|string|max:191',
                    'time'       => 'required|string|max:191',
                    'file_name'  => 'required|mimes:pdf|max:1000',
                    
                ];
            case 'GET':
                return [
                    'id'         => 'numeric|min:1',
                    'level'      => 'required|string|max:191',
                    'distance'   => 'required|string|max:191',
                    'time'       => 'required|string|max:191',
                    'file_name'  => 'required|mimes:pdf|max:1000',
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