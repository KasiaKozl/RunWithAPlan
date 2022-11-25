<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
{
    public function rules()
    {
        switch (request()->getMethod()) {
            case 'PUT':
                return [
                    'body'      => 'required|string|max:191',
                    
                ];
            case 'POST':
                return [
                    'body'      => 'required|string|max:191',
                    
                ];
            case 'GET':
                return [
                    'id'        => 'numeric|min:1',
                    'body'      => 'required|string|max:191',
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
