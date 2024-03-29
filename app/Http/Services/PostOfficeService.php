<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;
use App\Models\PostOffice;
use Exception;

trait PostOfficeService
{
    use ErrorUtil;
    public function createPostOfficeService($request)
    {

        try{
            $data['data'] =   PostOffice::create($request->all());
            return response()->json($data, 201);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function updatePostOfficeService($request)
    {

        try{
            $data['data'] = tap(PostOffice::where(["id" =>  $request["id"]]))->update(
                $request->only(
                    "name",
                    "ward_id",
                    "union_id"
                )
            )
            ->with("ward.union")
            ->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }


    }
    public function getPostOfficeService($request)
    {

        try{

            if($request->user()->hasRole("superadmin")){
                $data['data'] =   PostOffice::with("ward.union")->paginate(10);
                 } else {
                    $data['data'] = PostOffice::with("ward.union")->where([
                        "union_id" =>$request->user()->union_id
                     ])->paginate(10);

                 }
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function getPostOfficeByWardService($wardId,$request)
    {

        try{
            if($request->user()->hasRole("superadmin")){
                $data['data'] =   PostOffice::where(["ward_id" => $wardId])->get();
                 } else {
                    $data['data'] =   PostOffice::where(["ward_id" => $wardId])->where([
                        "union_id" =>$request->user()->union_id
                     ])->get();


                 }

            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function getPostOfficeByIdService($id,$request)
    {

        try{
            $data['data'] =   PostOffice::with("union","ward")->where(["id" => $id])->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function searchPostOfficeService($term,$request)
    {
        try{

        if($request->user()->hasRole("superadmin")){
            $data['data'] =   PostOffice::with("union","ward")
            ->where("name","like","%".$term."%")
            ->get();
             } else {
                $data['data'] =   PostOffice::with("union","ward")
                ->where("name","like","%".$term."%")
                ->where([
                    "union_id" =>$request->user()->union_id
                 ])
                ->get();
             }
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function deletePostOfficeService($id,$request)
    {
        try{
            PostOffice::where(["id" => $id])->delete();
            return response()->json(["ok" => true], 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }




}
