<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Jobs\V1\Lead as Jobs;
use App\Http\Requests\V1\Lead as Requests;
use Illuminate\Http\Response;

class LeadController extends Controller
{
    public function index()
    {
        $lead = Jobs\Index::dispatchSync();
        return response()->json(['lead' => $lead], Response::HTTP_OK);
    }

    public function store(Requests\Create $request)
    {
        Jobs\Create::dispatchSync(
            site_id: $request->site_id,
            name: $request->name,
            phone: $request->phone,
            comment: $request->comment
        );

        return response()->json(['success' => 'Лид добавлен'], Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        Jobs\Delete::dispatchSync($id);
        return response()->json(['success' => 'Лид удален'], Response::HTTP_OK);
    }
}
