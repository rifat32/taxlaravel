<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseStructureRequest;
use App\Http\Services\HouseStructureService;
use Illuminate\Http\Request;

class HouseStructureController extends Controller
{
    use HouseStructureService;
    public function createHouseStructure(HouseStructureRequest $request)
    {
        return $this->createHouseStructureService($request);
    }

    public function updateHouseStructure(Request $request)
    {
        return $this->updateHouseStructureService($request);
    }

    public function getHouseStructure(Request $request)
    {
        return $this->getHouseStructureService($request);
    }
    public function getHouseStructureByUnion($unionId,Request $request)
    {
        return $this->getHouseStructureByUnionService($unionId,$request);
    }

    public function getHouseStructureById($id,Request $request)
    {

        return $this->getHouseStructureByIdService($id,$request);
    }

    public function searchHouseStructure($term,Request $request)
    {
        return $this->searchHouseStructureService($term,$request);
    }
    public function deleteHouseStructure($id,Request $request)
    {
        return $this->deleteHouseStructureService($id,$request);
    }
}
