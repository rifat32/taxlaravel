<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Http\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ServiceService;
    public function createService(ServiceRequest $request)
    {
        return $this->createServiceService($request);
    }

    public function updateService(ServiceUpdateRequest $request)
    {
        return $this->updateServiceService($request);
    }

    public function getService(Request $request)
    {
        return $this->getServiceService($request);
    }
    public function getServiceById($id,Request $request)
    {

        return $this->getServiceByIdService($id,$request);
    }


    public function changeStatus(Request $request)
    {
        return $this->changeStatusServiceService($request);
    }

    public function searchService($term,Request $request)
    {
        return $this->searchServiceService($term,$request);
    }
    public function searchServiceByStatus($term,Request $request)
    {
        return $this->searchByStatusServiceService($term,$request);
    }

    public function deleteService($id,Request $request)
    {
        return $this->deleteServiceService($id,$request);
    }
    public function getInvoice($id,Request $request)
    {
        return $this->getInvoiceService($id,$request);
    }

}
