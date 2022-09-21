<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;
use App\Models\NonCitizenTaxPayment;
use Exception;

trait NonCitizenTaxPaymentService
{
    use ErrorUtil;
    public function createNonCitizenTaxPaymentService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/NonCitizenTaxPayment'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $insertableData = $request->validated();
            $data['data'] =   NonCitizenTaxPayment::create($insertableData);

            return response()->json($data, 201);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function updateNonCitizenTaxPaymentService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/NonCitizenTaxPayment'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $updatableData = $request->validated();
            $data['data'] = tap(NonCitizenTaxPayment::where(["id" =>  $request["id"]]))->update(
                $updatableData
            )
            ->with("union","noncitizen","method")
            ->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }


    }
    public function getNonCitizenTaxPaymentService($request)
    {

        try{

            if($request->user()->hasRole("superadmin")){
                $data['data'] =   NonCitizenTaxPayment::with("union","noncitizen","method")->paginate(10);
                 } else {
                    $data['data'] =   NonCitizenTaxPayment::with("union","noncitizen","method")->where([
                        "union_id" =>$request->user()->union_id
                    ])->paginate(10);


                 }
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function getNonCitizenTaxPaymentByIdService($id,$request)
    {

        try{
            $data['data'] =   NonCitizenTaxPayment::with("union","noncitizen","method")->where(["id" => $id])->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function searchNonCitizenTaxPaymentService($term,$request)
    {
        try{


        if($request->user()->hasRole("superadmin")){
            $data['data'] =   NonCitizenTaxPayment::with("union","noncitizen","method")
            ->leftJoin('non_holding_citizens', 'non_citizen_tax_payments.non_citizen_id', '=', 'non_holding_citizens.id')
            ->where(
                "non_holding_citizens.nid","like","%".$term."%"
            )
            ->orWhere(
                "non_holding_citizens.mobile","like","%".$term."%"
            )
            ->select("non_citizen_tax_payments.*")
            ->latest()
        ->paginate(10);
             } else {
                $data['data'] =   NonCitizenTaxPayment::with("union","noncitizen","method")
                ->leftJoin('non_holding_citizens', 'non_citizen_tax_payments.non_citizen_id', '=', 'non_holding_citizens.id')
                ->where(function($query) use($term){
                    $query ->where(
                        "non_holding_citizens.nid","like","%".$term."%"
                    )
                    ->orWhere(
                        "non_holding_citizens.mobile","like","%".$term."%"
                    );
                })

                ->select("non_citizen_tax_payments.*")
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

    public function deleteNonCitizenTaxPaymentService($id,$request)
    {
        try{
            NonCitizenTaxPayment::where(["id" => $id])->delete();
            return response()->json(["ok" => true], 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function getInvoiceService($id, $request)
    {
        try {
            $result=NonCitizenTaxPayment::with('union','noncitizen')
            ->find($id);



         $data["invoice"] = view("invoice.non_citizen_payment", ["result" => $result])->render();





                    return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }


}
