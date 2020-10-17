<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AirportCodeRequest;

class AirportController extends Controller
{

    public function airport(AirportCodeRequest $request)
    {
        return response()->json($request->all());
    }
}
