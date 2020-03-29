<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoneRequest extends FormRequest
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
        return [
            //
            'new_done' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'new_done.required' => '何をした？が入力されていません',
        ];
    }
}