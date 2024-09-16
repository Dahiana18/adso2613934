<?php

namespace App\Http\Requests;

use App\Models\Game;
use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{

/**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method() == 'PUT') {
            return [
                'title' => 'required|unique:games,title,' . $this->id,
                'developer' => 'required|string',
                'releasedate' => 'required|date',                 
                'price' => 'required|string', 
                'genre' => 'required|string',                    
                'description' => 'required',                
            ];
        } else {
            return [
                'title' => 'required|unique:games', 
                'developer' => 'required|string',
                'releasedate' => 'required|date',                
                'price' => 'required|string', 
                'genre' => 'required|string',                    
                'description' => 'required',  
                'image'=>'required|image',
            ];
    }
}

    public function messages(): array
    {
        return [
            'name.required' => 'The :attribute is required.'
        ];
    }
        public function attributes(): array
        {
            return [
                'name' => 'name'
            ];
        }
}

