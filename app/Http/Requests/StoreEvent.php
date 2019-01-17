<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      $user = auth()->user();
      if (!$user) {
          return false;
      }
      if ($user->hasRole('investigador') || $user->hasRole('profesional')) {
        return true;
      }else{
        return false;
      }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|unique:events|max:255',
          'event_type_id' => 'required|exists:event_types,id',
          'price' => 'required_if:event_type_id,3|integer',
        ];
    }
}
