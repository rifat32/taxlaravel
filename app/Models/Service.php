<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "union_id",
            "ward_id"  ,
            "village_id"  ,
            "post_office_id"  ,
            "upazila_id"  ,
            "district_id" ,
            "user_id",

            "applicant_name" ,
            "applicant_name_en" ,
            "applicant_m_name" ,
            "applicant_f_name" ,
            "applicant_holding_no" ,
            "applicant_phone" ,
            "applicant_nid" ,
            "applicant_email" ,
            "applicant_img" ,
            "apply_types" ,
            "status" ,
            "trade_id" ,
            "death_day" ,
            "wife_name" ,
            "previous_village" ,
            "disability" ,
            "previous_post_office" ,
            "previous_opozilla" ,
            "privious_zilla" ,
            "gardian_occupaion" ,
            "gardian_income" ,
            "fighter_certificat_number" ,
            "fighter_date" ,
            "fighter_gadget_number" ,
            "fighter_gadget_number2",
            "fighter_name" ,
            "fighter_wife" ,
            "tribal_community" ,
            "occupation" ,
            "badi_id" ,
            "death_place" ,
            "died_name" ,
            "died_father" ,
            "died_mother" ,
            "died_village" => "nullable",
            "died_post_office" ,
            "died_upozilla" ,
            "died_zilla" ,
            "died_ward"
    ];
    protected $casts = [
        "union_id",
            "ward_id"  ,
            "village_id"  ,
            "post_office_id"  ,
            "upazila_id"  ,
            "district_id" ,
            "user_id",
    ];
    public function members()
    {
        return $this->hasMany(Member::class, 'citizen_id', 'id');
    }
    public function union()
    {
        return $this->hasOne(Union::class, 'id', 'union_id')->withTrashed();
    }
    public function ward()
    {
        return $this->hasOne(Ward::class, 'id', 'ward_id')->withTrashed();
    }
    public function village()
    {
        return $this->hasOne(Village::class, 'id', 'village_id')->withTrashed();
    }
    public function postOffice()
    {
        return $this->hasOne(PostOffice::class, 'id', 'post_office_id')->withTrashed();
    }
    public function upazila()
    {
        return $this->hasOne(Upazila::class, 'id', 'upazila_id')->withTrashed();
    }
    public function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id')->withTrashed();
    }
}
