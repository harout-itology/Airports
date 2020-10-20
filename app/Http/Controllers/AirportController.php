<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportCodeRequest;
use App\Services\CurlServiceInterface;
use App\Services\PrintTypeService;
use App\Lib\PrintType\PrintJSON;
use Exception;

class AirportController extends Controller
{
    private $call_service;
    private $print_type;

    public function __construct(CurlServiceInterface $call_service, PrintTypeService $print_type)
    {
        $this->call_service = $call_service;
        $this->print_type = $print_type;
    }

    public function airport(AirportCodeRequest $request)
    {
        try {
            $call =  $this->call_service->getValues($request)->callAPI();
            return $this->print_type->callPrint(new PrintJSON, $call);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }


    }

}


