<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;
use App\Models\Complain;
use Exception;

trait ComplainService
{
    use ErrorUtil;
    public function createComplainService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/Complain'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $insertableData = $request->validated();
            $data['data'] =   Complain::create($insertableData);

            return response()->json($data, 201);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function updateComplainService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/Complain'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $updatableData = $request->validated();
            $data['data'] = tap(Complain::where(["id" =>  $request["id"]]))->update(
                $updatableData
            )
            ->with("union","chairman")
            ->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }


    }
    public function getComplainService($status,$request)
    {

        try{
$is_solved = null;
            if($status == "solved") {
                $is_solved = true;
            } else {
                $is_solved = false;
            }

            $data['data'] =   Complain::with("union","chairman")
            ->where([
                "is_solved" => $is_solved
            ])
            ->paginate(10);
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function getComplainByIdService($id,$request)
    {

        try{
            $data['data'] =   Complain::with("union","chairman")->where(["id" => $id])->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function searchComplainService($term,$request)
    {
        try{
            $data['data'] =   Complain::with("union","chairman")
        ->where("complain_no","like","%".$term."%")
        ->get();
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function deleteComplainService($id,$request)
    {
        try{
            Complain::where(["id" => $id])->delete();
            return response()->json(["ok" => true], 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }




}
