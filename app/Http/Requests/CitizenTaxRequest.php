<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitizenTaxRequest extends FormRequest
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
            "holding_no" => "required",
            "note" => "required",
            "amount" => "required|numeric",
            "current_year" => "required",
            "union_id" => "required|numeric",
            "citizen_id" => "nullable",
            "ward_id" => "required|numeric"
        ];
    }
}
