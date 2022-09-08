<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;
use App\Models\Chairman;
use Exception;

trait ChairmanService
{
    use ErrorUtil;
    public function createChairmanService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/Chairman'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $insertableData = $request->toArray();

            $data['data'] =   Chairman::create($insertableData);

            return response()->json($data, 201);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function updateChairmanService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/Chairman'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $updatableData = $request->validated();
            $data['data'] = tap(Chairman::where(["id" =>  $request["id"]]))->update(
                $updatableData
            )
            ->with("union")
            ->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }


    }
    public function getChairmanService($request)
    {

        try{


            if($request->user()->hasRole("superadmin")){
                $data['data'] =   Chairman::with("union")
                ->latest()
                ->paginate(10);
            } else {
                $data['data'] =   Chairman::with("union")
                ->where([
                    "union_id" =>$request->user()->union_id
                ])
            ->latest()
            ->paginate(10);

            }
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function getAllChairmanService($request)
    {

        try{
            if($request->user()->hasRole("superadmin")){
                $data['data'] =   Chairman::with("union")
                ->latest()
                ->get();
            } else {
                $data['data'] =   Chairman::with("union")
                ->where([
                    "union_id" =>$request->user()->union_id
                ])
            ->latest()
            ->get();

            }
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function getChairmanByIdService($id,$request)
    {

        try{
            $data['data'] =   Chairman::with("union")->where(["id" => $id])->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function searchChairmanService($term,$request)
    {
        try{

        if($request->user()->hasRole("superadmin")){
            $data['data'] =   Chairman::with("union")
        ->where("name","like","%".$term."%")
        ->orWhere("nid","like","%".$term."%")
        ->orWhere("mobile","like","%".$term."%")
        ->orWhere("address","like","%".$term."%")
        ->latest()
        ->paginate(10);
        } else {
            $data['data'] =   Chairman::with("union")
            ->where([
                "union_id" =>$request->user()->union_id
            ])
            ->where("name","like","%".$term."%")
            ->orWhere("nid","like","%".$term."%")
            ->orWhere("mobile","like","%".$term."%")
            ->orWhere("address","like","%".$term."%")
            ->latest()
            ->paginate(10);

        }
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function deleteChairmanService($id,$request)
    {
        try{
            Chairman::where(["id" => $id])->delete();
            return response()->json(["ok" => true], 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }




}
