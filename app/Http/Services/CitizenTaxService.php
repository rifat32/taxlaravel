<?php

namespace App\Http\Services;

use App\Http\Utils\ErrorUtil;
use App\Models\CitizenTax;
use Exception;

trait CitizenTaxService
{
    use ErrorUtil;
    public function createCitizenTaxService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/CitizenTax'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $insertableData = $request->validated();

            $data['data'] =   CitizenTax::create($insertableData);

            return response()->json($data, 201);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function updateCitizenTaxService($request)
    {

        try{
            // $imageName = time().'.'.$request->image->extension();
            // $request->image->move(public_path('img/CitizenTax'), $imageName);
            // $imageName = "img/restaurant/" . $imageName;
            $updatableData = $request->validated();
            $data['data'] = tap(CitizenTax::where(["id" =>  $request["id"]]))->update(
                $updatableData
            )
            ->with("union","citizen","ward")
            ->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }


    }
    public function getCitizenTaxService($request)
    {

        try{

            if($request->user()->hasRole("superadmin")){

                $data['data'] =   CitizenTax::with("union","citizen","ward")->latest()
                ->paginate(10);
                 } else {
                    $data['data'] =   CitizenTax::with("union","citizen","ward")
                    ->where([
                        "union_id" =>$request->user()->union_id
                    ])->latest()
                    ->paginate(10);


                 }
        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function getCitizenTaxByIdService($id,$request)
    {

        try{
            $data['data'] =   CitizenTax::with("union","citizen","ward")->where(["id" => $id])->first();
            return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }
    }
    public function searchCitizenTaxService($term,$request)
    {
        try{



            if($request->user()->hasRole("superadmin")){

                $data['data'] =   CitizenTax::with("union","citizen","ward")
                ->leftJoin('citizens', 'citizen_taxes.citizen_id', '=', 'citizens.id')
                ->where(
                    "citizens.mobile","like","%".$term."%"
                )
                ->orWhere(
                    "citizens.nid_no","like","%".$term."%"
                )
                ->select("citizen_taxes.*")
                ->latest()
                ->paginate(10);
                 } else {
                    $data['data'] =   CitizenTax::with("union","citizen","ward")
                    ->leftJoin('citizens', 'citizen_taxes.citizen_id', '=', 'citizens.id')
                    ->where([
                        "union_id" =>$request->user()->union_id
                    ])
                    ->where(function($query) use($term){
                        $query->where(
                            "citizens.mobile","like","%".$term."%"
                        )

                        ->orWhere(
                            "citizens.nid_no","like","%".$term."%"
                        );
                    })

                    ->select("citizen_taxes.*")
                    ->latest()
                    ->paginate(10);

                 }



        return response()->json($data, 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }

    public function deleteCitizenTaxService($id,$request)
    {
        try{
            CitizenTax::where(["id" => $id])->delete();
            return response()->json(["ok" => true], 200);
        } catch(Exception $e){
        return $this->sendError($e,500);
        }

    }
    public function getInvoiceService($id, $request)
    {
        try {
            $tax=CitizenTax::with('citizen')->find($id);


         $data["invoice"] = view("invoice.citizen_tax", ["tax" => $tax])->render();





                    return response()->json($data, 200);
        } catch (Exception $e) {
            return $this->sendError($e, 500);
        }
    }



}
