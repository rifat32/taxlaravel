<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;
use App\Models\TaxPayment;
use Exception;

trait TaxPaymentService
{
    use ErrorUtil;
    public function createTaxPaymentService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/TaxPayment'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $insertableData = $request->validated();
            $data['data'] =   TaxPayment::create($insertableData);

            return response()->json($data, 201);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function updateTaxPaymentService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/TaxPayment'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $updatableData = $request->validated();
            $data['data'] = tap(TaxPayment::where(["id" =>  $request["id"]]))->update(
                $updatableData
            )
            ->with("union","citizen","method","ward")
            ->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }


    }
    public function getTaxPaymentService($request)
    {

        try{
            if($request->user()->hasRole("superadmin")){
                $data['data'] =   TaxPayment::with("union","citizen","method","ward")->latest()
            ->paginate(10);
                 } else {
                    $data['data'] =   TaxPayment::with("union","citizen","method","ward") ->where([
                        "union_id" =>$request->user()->union_id
                     ])->latest()
                    ->paginate(10);

                 }

        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function getTaxPaymentByIdService($id,$request)
    {

        try{
            $data['data'] =   TaxPayment::with("union","citizen","method","ward")->where(["id" => $id])->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function searchTaxPaymentService($term,$request)
    {
        try{

            if($request->user()->hasRole("superadmin")){
                $data['data'] =   TaxPayment::with("union","citizen","method","ward")
                ->leftJoin('citizens', 'tax_payments.citizen_id', '=', 'citizens.id')
                ->where(function($query) use($term){
                    $query    ->where(
                        "citizens.mobile","like","%".$term."%"
                    )
                    ->orWhere(
                        "citizens.nid_no","like","%".$term."%"
                    );
                })

                ->select("tax_payments.*")
                ->latest()
                ->paginate(10);
                 } else {
                    $data['data'] =   TaxPayment::with("union","citizen","method","ward")
                    ->leftJoin('citizens', 'tax_payments.citizen_id', '=', 'citizens.id')
                    ->where([
                        "union_id" =>$request->user()->union_id
                     ])
                    ->where(
                        "citizens.mobile","like","%".$term."%"
                    )
                    ->orWhere(
                        "citizens.nid_no","like","%".$term."%"
                    )
                    ->select("tax_payments.*")
                    ->latest()
                    ->paginate(10);


                 }
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function deleteTaxPaymentService($id,$request)
    {
        try{
            TaxPayment::where(["id" => $id])->delete();
            return response()->json(["ok" => true], 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function getInvoiceService($id, $request)
    {
        try {
            $result=TaxPayment::with('citizen','method','citizen.union','citizen.ward','citizen.village','citizen.district','citizen.upazila','citizen.postoffice',"ward")
            ->find($id);




         $data["invoice"] = view("invoice.tax_payment", ["result" => $result])->render();





                    return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }


}
