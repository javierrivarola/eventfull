<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestion extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'text' => 'required|unique:questions|max:255',
          'talk_id' => 'sometimes|exists:talks,id',
          'enable_comments' => 'sometimes|boolean'
        ];
    }
}
