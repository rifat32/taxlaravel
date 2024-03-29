<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitizenUpdateRequest extends FormRequest
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
            "id" => "required|numeric",
            "union_id" => "required|numeric",
            "ward_id"      =>"required|numeric",
            "village_id"      =>"required|numeric",
            "post_office_id"      =>"required|numeric",
            "upazila_id"      =>"required|numeric",
            "district_id"      =>"required|numeric",

            "holding_no"      =>"required",
            "thana_head_name"      =>"required",
            "thana_head_religion"      =>"required",
            "thana_head_gender"      =>"required",
            "thana_head_occupation"      =>"required",
            "mobile"      =>"required",
            "guardian"      =>"required",
            "c_mother_name"      =>"required",
            "nid_no"      =>"required",
            "is_tubewell"      =>"required|string",
            "latrin_type"      =>"required",
            "type_of_living"      =>"required",
            "type_of_organization"      =>"required",
            "previous_due"      =>"required|numeric",
            "tax_amount"      =>"required|numeric",
            "male"      =>"required|numeric",
            "female"      =>"required|numeric",
            "annual_price"      =>"required|numeric",
            "gov_advantage"      =>"required|string",
            // "image"      =>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "image"      =>"required|string",
            "current_year"      =>"required",
            "raw_house"      =>"required|numeric",
            "half_building_house"      =>"required|numeric",
            
            "strong_house" => "required|numeric",
            "half_strong_house" => "required|numeric",
            "weak_house" => "required|numeric",

            "building_house"      =>"required|numeric",
            "members"      =>"required|array",
         "members.*.id"      =>"required|numeric",
          "members.*.name"      =>"required",
          "members.*.father_name"      =>"required",
          "members.*.mother_name"      =>"required",
          "members.*.village_name"      =>"required",
          "members.*.post_office"      =>"required",
          "members.*.upazila"      =>"required",
          "members.*.district"      =>"required",
          "members.*.nid"      =>"required",
        //   "members.*.image"      =>"required"

            ];
    }
}
