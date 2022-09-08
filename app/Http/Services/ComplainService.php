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


            if($request->user()->hasRole("superadmin")){
                $data['data'] =   Complain::with("union","chairman")
                ->where([
                    "status" => $status
                ])
                ->paginate(10);
                 } else {
                    $data['data'] =   Complain::with("union","chairman")
                    ->where([
                        "status" => $status
                    ])
                    ->where([
                        "union_id" =>$request->user()->union_id
                    ])
                    ->paginate(10);


                 }
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
    public function searchComplainService($status,$term,$request)
    {
        try{



        if($request->user()->hasRole("superadmin")){
            $data['data'] =   Complain::with("union","chairman")
            ->where([
                "status" => $status
            ])
        ->where("complain_no","like","%".$term."%")
        ->latest()
        ->paginate(10);
             } else {
                $data['data'] =   Complain::with("union","chairman")
            ->where([
                "status" => $status
            ])
            ->where([
                "union_id" =>$request->user()->union_id
            ])
        ->where("complain_no","like","%".$term."%")
        ->latest()
        ->paginate(10);



             }



        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function searchComplainByDateService($status,$from,$to,$request)
    {
        try{


            if($request->user()->hasRole("superadmin")){
                $data['data'] =   Complain::with("union","chairman")
                ->where([
                    "status" => $status
                ])
                ->whereBetween('date', [$from, $to])
            ->latest()
            ->paginate(10);
                 } else {
                    $data['data'] =   Complain::with("union","chairman")
            ->where([
                "status" => $status
            ])
            ->where([
                "union_id" =>$request->user()->union_id
            ])
            ->whereBetween('date', [$from, $to])
        ->latest()
        ->paginate(10);




                 }







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


    public function getInvoiceService($id, $request)
    {
        try {


            $result = Complain::with( 'chairman')
                ->find($id);






         $data["invoice"] = view("invoice.complainv2", ["result" => $result])->render();



                    return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }

}
