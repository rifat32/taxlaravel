<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseStructureRequest extends FormRequest
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
        "union_id"=> "required",
         "strong_house_tax"=>"required|numeric",
         "half_strong_house_tax"=>"required|numeric",
         "weak_house_tax"=>"required|numeric",
         "strong_house_yearly_tax"=>"required|numeric",
         "half_strong_yearly_tax"=>"required|numeric",
         "weak_house_yearly_tax"=>"required|numeric",
        ];
    }
}
