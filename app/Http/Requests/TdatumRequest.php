<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TdatumRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return
        [
            'name' => 'required',
            'certificate_num' => 'required',
			'serial' => 'required',
			'num' => 'required',
			'document_type' => 'required',
			'date' => 'required|date',
			'coach_name' => 'required',
			'nation' => 'required',
			'notes' => 'nullable',
        ];
    }
}
