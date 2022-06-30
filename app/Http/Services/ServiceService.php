<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;
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
                    'current_year' =>  $insertableData["current_year"]

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
            $data['data'] =   Service::with("union", "ward", "village", "postOffice", "upazila", "district")->paginate(10);
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
            $data['data'] =   Service::with("union", "ward", "village", "postOffice", "upazila", "district")
                ->where("holding_no", "like", "%" . $term . "%")
                ->orWhere("thana_head_name", "like", "%" . $term . "%")
                ->orWhere("thana_head_religion", "like", "%" . $term . "%")
                ->orWhere("thana_head_occupation", "like", "%" . $term . "%")
                ->orWhere("mobile", "like", "%" . $term . "%")
                ->orWhere("c_mother_name", "like", "%" . $term . "%")
                ->orWhere("guardian", "like", "%" . $term . "%")
                ->orWhere("nid_no", "like", "%" . $term . "%")
                ->get();
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
}
