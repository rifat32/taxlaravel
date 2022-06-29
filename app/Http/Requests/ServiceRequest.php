<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            "union_id" => "required|numeric",
            "ward_id"      => "required|numeric",
            "village_id"      => "required|numeric",
            "post_office_id"      => "required|numeric",
            "upazila_id"      => "required|numeric",
            "district_id"      => "required|numeric",

            "applicant_name" => "nullable",
            "applicant_name_en" => "nullable",
            "applicant_m_name" => "nullable",
            "applicant_f_name" => "nullable",
            "applicant_holding_no" => "nullable",
            "applicant_phone" => "nullable",
            "applicant_nid" => "nullable",
            "applicant_email" => "nullable",
            "applicant_img" => "nullable",
            "apply_types" => "nullable",
            "status" => "nullable",
            "trade_id" => "nullable",
            "death_day" => "nullable",
            "wife_name" => "nullable",
            "previous_village" => "nullable",
            "disability" => "nullable",
            "previous_post_office" => "nullable",
            "previous_opozilla" => "nullable",
            "privious_zilla" => "nullable",
            "gardian_occupaion" => "nullable",
            "gardian_income" => "nullable",
            "fighter_certificat_number" => "nullable",
            "fighter_date" => "nullable",
            "fighter_gadget_number" => "nullable",
            "fighter_name" => "nullable",
            "fighter_wife" => "nullable",
            "tribal_community" => "nullable",
            "occupation" => "nullable",
            "badi_id" => "nullable",
            "death_place" => "nullable",
            "died_name" => "nullable",
            "died_father" => "nullable",
            "died_mother" => "nullable",
            "died_village" => "nullable",
            "died_post_office" => "nullable",
            "died_upozilla" => "nullable",
            "died_zilla" => "nullable",
            "died_ward" => "nullable",








        ];
    }
}
