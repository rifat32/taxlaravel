<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NonCitizenTaxPaymentRequest extends FormRequest
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
            "payment_for" => "required|date",
            "amount" => "required|numeric",
            "due" => "required|numeric",
            "current_year" => "required",
            "union_id" => "required|numeric",
            "ward_id" => "required|numeric",
            "non_holding_no" => "required",
            "non_citizen_id" => "required|numeric",
            "method_id" => "required|numeric"
        ];
    }
}
