<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;
use App\Models\Chairman;
use App\Models\Service;
use App\Models\Member;
use App\Models\Warish;
use Exception;
use Illuminate\Support\Facades\DB;

trait ServiceService
{
    use ErrorUtil;
    public function createServiceService($request)
    {

        try {

            $insertableData = $request->validated();
            $insertableData["user_id"] = $request->user()->id;
            if($insertableData["apply_types"] == '1'){
                // $vat = (15 / $request->fee ) * 100;

                $tradeId = DB::table('trade_licenses')->insertGetId(
                    [
                    'institute' => $insertableData["institute"],
                    'owner' => $insertableData["owner"],
                    'guadian' => $insertableData["guadian"],
                    'present_addess' => $insertableData["present_addess"],
                    'license_no' => $insertableData["license_no"],
                    'ward_id' => $insertableData["ward_id"],
                    'business_type' => $insertableData["business_type"],
                    'permanent_addess' => $insertableData["permanent_addess"],
                    'union_id'=> $insertableData["union_id"],
                    'mother_name' =>  $insertableData["applicant_m_name"],
                    'nid' => $insertableData["applicant_nid"],
                    'expire_date'=> $insertableData["expire_date"],
                    'current_year' =>  $insertableData["current_year"],
                    'mobile_no' =>  $insertableData["applicant_phone"],
                    'fee' =>  $insertableData["fee"],
                    'fee_des' =>  $insertableData["fee_des"],
                    'vat' =>  $insertableData["vat"],
                    'vat_des' =>  $insertableData["vat_des"],
                    'total' =>  $insertableData["total"],


                    ]
                );

                $insertableData["trade_id"] = $tradeId;
             }

            $service =   Service::create($insertableData);
            if($insertableData["apply_types"] == '2'){
                foreach($insertableData["warish"] as $warish){
                    Warish::insert([
                       'name'=>$warish["name"],
                       'relation'=>$warish["relation"],
                       'age'=>$warish["age"],
                       'comment'=>$warish["comment"],
                       'applicant_id'=>$service->id
                   ]) ;
                     }
             }


            return response()->json($service, 201);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }
    public function updateServiceService($request)
    {

        try {
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/Service'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $updatableData = $request->validated();


            foreach ($updatableData["members"] as $member) {
                $member["image"] = "image";
                $member["Service_id"] = $updatableData["id"];
                $updatedMember =  Member::upsert(
                    [
                        collect($member)->only([
                            "id",
                            "Service_id",
                            "name",
                            "father_name",
                            "mother_name",
                            "village_name",
                            "post_office",
                            "upazila",
                            "district",
                            "nid",
                            "image"

                        ])
                            ->toArray()
                    ],
                    ['id', 'Service_id'],
                    collect($member)->only([
                        "Service_id",
                        "name",
                        "father_name",
                        "mother_name",
                        "village_name",
                        "post_office",
                        "upazila",
                        "district",
                        "nid",
                        "image"
                    ])
                        ->toArray()
                );
            }



            $data['data'] = tap(Service::where(["id" =>  $updatableData["id"]]))->update(
                collect($updatableData)->only([
                    "union_id",
                    "ward_id",
                    "village_id",
                    "post_office_id",
                    "upazila_id",
                    "district_id",

                    "holding_no",
                    "thana_head_name",
                    "thana_head_religion",
                    "thana_head_gender",
                    "thana_head_occupation",
                    "mobile",
                    "guardian",
                    "c_mother_name",
                    "nid_no",
                    "is_tubewell",
                    "latrin_type",
                    "type_of_living",
                    "type_of_organization",
                    "previous_due",
                    "tax_amount",
                    "male",
                    "female",
                    "annual_price",
                    "gov_advantage",
                    "image",
                    "current_year",
                    "raw_house",
                    "half_building_house",
                    "building_house"
                ])
                    ->toArray()
            )

                ->with("union", "ward", "village", "postOffice", "upazila", "district", "members")
                ->first();
            return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }
    public function getServiceService($request)
    {

        try {
            if($request->user()->hasRole("superadmin")){
                $data['data'] =   Service::with("union", "ward", "village", "postOffice", "upazila", "district")->latest()->paginate(10);
                 } else {
                    $data['data'] =   Service::with("union", "ward", "village", "postOffice", "upazila", "district")->where([
                        "union_id" =>$request->user()->union_id
                     ])->latest()->paginate(10);






                 }

            return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }
    public function getServiceByIdService($id, $request)
    {

        try {
            $data['data'] =   Service::with("union", "ward", "village", "postOffice", "upazila", "district")->where(["id" => $id])->first();
            return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }
    public function getServiceByWardIdService($wardId, $request)
    {

        try {
            $data['data'] =   Service::where(["ward_id" => $wardId])->get();
            return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }
    public function getServiceByUnionIdService($wardId, $request)
    {

        try {
            $data['data'] =   Service::where(["union_id" => $wardId])->get();
            return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }

    public function searchServiceService($term, $request)
    {
        try {
            if($request->user()->hasRole("superadmin")){
                $data['data'] =   Service::with("union", "ward", "village", "postOffice", "upazila", "district")

                ->where(function($query) use($term){
                    $query    ->where("applicant_holding_no", "like", "%" . $term . "%")
                    ->orWhere("applicant_name_en", "like", "%" . $term . "%")
                    ->orWhere("applicant_name", "like", "%" . $term . "%")
                    ->orWhere("applicant_nid", "like", "%" . $term . "%")
                    ->orWhere("applicant_phone", "like", "%" . $term . "%");
                })
                ->latest()
                ->paginate(10);
                 } else {
                    $data['data'] =   Service::with("union", "ward", "village", "postOffice", "upazila", "district")
                    ->where([
                        "union_id" =>$request->user()->union_id
                     ])
                    ->where(function($query) use($term){
                        $query    ->where("applicant_holding_no", "like", "%" . $term . "%")
                        ->orWhere("applicant_name_en", "like", "%" . $term . "%")
                        ->orWhere("applicant_name", "like", "%" . $term . "%")
                        ->orWhere("applicant_nid", "like", "%" . $term . "%")
                        ->orWhere("applicant_phone", "like", "%" . $term . "%");
                    })
                    ->latest()
                    ->paginate(10);





                 }

            return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }

    public function deleteServiceService($id, $request)
    {
        try {
            Service::where(["id" => $id])->delete();
            return response()->json(["ok" => true], 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }
    public  function banglaNumber(String $date)
    {
        $bndate = "";

        $array = str_split(
            $date
        );
        foreach ($array as $char) {
            switch ($char) {
                case "0":
                    $bndate .= "০";
                    break;
                case "1":
                    $bndate .= "১";
                    break;
                case "2":
                    $bndate .= "২";
                    break;
                case "3":
                    $bndate .= "৩";
                    break;
                case "4":
                    $bndate .= "৪";
                    break;
                case "5":
                    $bndate .= "৫";
                    break;
                case "6":
                    $bndate .= "৬";
                    break;
                case "7":
                    $bndate .= "৭";
                    break;
                case "8":
                    $bndate .= "৮";
                    break;
                case "9":
                    $bndate .= "৯";
                    break;
                case "/":
                    $bndate .= "/";
                    break;
                    case " ":
                        $bndate .= " ";
                        break;
               case "-":
                            $bndate .= "-";
                            break;
            }
        }


        return $bndate;
    }
    public function getInvoiceService($id, $request)
    {
        try {
            $sign =  Chairman::first()->sign_image;
            $servicesRealQuery =
            Service::where(["services.id" => $id])
                ->join('unions', 'services.union_id', '=', 'unions.id')
                ->join('villages', 'services.village_id', '=', 'villages.id')
                ->join('wards', 'services.ward_id', '=', 'wards.id')
                ->join('upazilas', 'services.upazila_id', '=', 'upazilas.id')
                ->join('districts', 'services.district_id', '=', 'districts.id')
                ->join('post_offices', 'services.post_office_id', '=', 'post_offices.id');
            $servicesReal = $servicesRealQuery->select(
                'services.*',
                'unions.name as union_name',
                  'unions.id as union_id',
                'villages.name as village_name',
                'wards.ward_no as ward_no',
                'upazilas.name as upazila_name',
                'districts.name as district_name',
                'post_offices.name as post_office',
            )
                ->first();

                $servicesReal->sign = $sign;


            $apply_type = $servicesReal->apply_types;
            $datee = date_create($servicesReal->created_at);
            $date = date_format($datee, "Y/m/d");
            $date = $this->banglaNumber($date);
            $year = date_format($datee, "Y");
            $year = $this->banglaNumber($year);

            if ($apply_type == "0") {
                $data["invoice"] = view("services.nagorik", ["services" => $servicesReal, "date" => $date])->render();
            }
            if ($apply_type == "1") {
                $servicesTrade = $servicesRealQuery
                    ->join('trade_licenses', 'services.trade_id', '=', 'trade_licenses.id')
                    ->select(
                        'services.*',
                        'unions.name as union_name',
                        'villages.name as village_name',
                        'wards.ward_no as ward_no',
                        'upazilas.name as upazila_name',
                        'districts.name as district_name',
                        'post_offices.name as post_office',
                        'trade_licenses.permanent_addess as trade_permanent_addess',
                        'trade_licenses.current_year as trade_current_year',
                        'trade_licenses.license_no as trade_license_no',
                        'trade_licenses.present_addess as trade_present_addess',
                        'trade_licenses.business_type as business_type',
                        'trade_licenses.fee as trade_fee',
                        'trade_licenses.fee_des as trade_fee_des',
                        'trade_licenses.vat as trade_vat',
                        'trade_licenses.vat_des as trade_vat_des',

                        'trade_licenses.expire_date as expire_date',
                        'trade_licenses.institute as institute_name',
                    )
                    ->first();
                    $servicesTrade->sign = $sign;
                    $servicesTrade->trade_current_year = $this->banglaNumber( $servicesTrade->trade_current_year);


                  $data["invoice"] = view("services.tradCertificate", ["services" => $servicesTrade, "date" => $date, "year" => $year])->render();
            }
            if ($apply_type == '2') {
                $warishes =  DB::table('warishes')
                ->where(["applicant_id" => $servicesReal->id])
                    ->get();
                $numwarishes = count($warishes->toArray());

                $data["invoice"] = view("services.waeishCertificate", ["services" => $servicesReal, "date" => $date, "warishes" => $warishes, 'count' => $numwarishes])->render();
            }
            if ($apply_type == "3") {
                $data["invoice"] = view("services.characteristicLetter", ["services" => $servicesReal, "date" => $date, 'year' => $year])->render();
            }
            if ($apply_type == "4") {
                $data["invoice"] = view("services.deathLetter", ["services" => $servicesReal, "date" => $date, 'year' => $year])->render();
            }
            if ($apply_type == "8") {
                $data["invoice"] = view("services.secondMarried", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }
            if ($apply_type == "10") {
                $data["invoice"] = view("services.disabledLetter", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }
            if ($apply_type == "12") {
                $data["invoice"] = view("services.prottoyonpotro", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }
            if ($apply_type == "13") {
                $data["invoice"] = view("services.electionLetter", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }
            if ($apply_type == "14") {
                $data["invoice"] = view("services.guardianLetter", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }
            if ($apply_type == "15") {
                $data["invoice"] = view("services.freedomfighterLetter", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }
            if ($apply_type == "16") {
                $data["invoice"] = view("services.freedomfighterSonLetter", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }

            if ($apply_type == "17") {
                $data["invoice"] = view("services.twoNamePotro", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }

            if ($apply_type == "18") {
                $data["invoice"] = view("services.tribalPotro", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }

            if ($apply_type == "19") {
                $data["invoice"] = view("services.occupation", ["services" => $servicesReal, "date" => $date, "year" => $year])->render();
            }

            if ($apply_type == "20") {
                $badiProtibadi = DB::table('badi_protibadi')
                    ->where(["id" => $servicesReal->badi_id])
                    ->first();
                    $data["invoice"] = view("services.badiProtibadi", ["services" => $servicesReal, "date" => $date, "year" => $year, "badiProtibadi" => $badiProtibadi])->render();
            }





            return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }

}
