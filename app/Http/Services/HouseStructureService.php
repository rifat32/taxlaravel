<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;


use App\Models\HouseStructure;
use Exception;

trait HouseStructureService
{
    use ErrorUtil;
    public function createHouseStructureService($request)
    {

        try{
            $data['data'] =   HouseStructure::create($request->all());
            return response()->json($data, 201);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function updateHouseStructureService($request)
    {

        try{
            $data['data'] = tap(HouseStructure::where(["id" =>  $request["id"]]))->update(
                $request->only(
                    "strong_house_tax",
                    "half_strong_house_tax",
                    "weak_house_tax",

                    "strong_house_yearly_tax",
                    "half_strong_yearly_tax",
                    "weak_house_yearly_tax",
                    "union_id"
                )
            )
            ->with("union")
            ->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }


    }
    public function getHouseStructureService($request)
    {

        try{
            $data['data'] =   HouseStructure::with("union")->paginate(10);
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function getHouseStructureByUnionService($unionId,$request)
    {

        try{
            $data['data'] =   HouseStructure::with("union")->where(["union_id" => $unionId])->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function getHouseStructureByIdService($id,$request)
    {

        try{
            $data['data'] =   HouseStructure::with("union")->where(["id" => $id])->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function searchHouseStructureService($term,$request)
    {
        try{
            $data['data'] =   HouseStructure::with("union")
        ->where("name","like","%".$term."%")
        ->get();
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function deleteHouseStructureService($id,$request)
    {
        try{
            HouseStructure::where(["id" => $id])->delete();
            return response()->json(["ok" => true], 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }




}
