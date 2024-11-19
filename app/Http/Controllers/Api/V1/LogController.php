<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Jobs\V1\Log as Jobs;
use Illuminate\Http\Response;

class LogController extends Controller
{
    public function index()
    {
        $log = Jobs\Index::dispatchSync();
        return response()->json(['log' => $log], Response::HTTP_OK);
    }
}
