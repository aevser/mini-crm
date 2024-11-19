<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Jobs\V1\Site as Jobs;
use App\Http\Requests\V1\Site as Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function index()
    {
        $site = Jobs\Index::dispatchSync();
        return response()->json(['site' => $site], Response::HTTP_OK);
    }

    public function store(Requests\Create $request)
    {
        Jobs\Create::dispatchSync(
            name: $request->name,
            url: $request->url,
            api_token: Str::random(60)
        );

        return response()->json(['success' => 'Сайт добавлен'], Response::HTTP_CREATED);
    }

    public function update(Requests\Update $request, $id)
    {
        Jobs\Update::dispatchSync(
            site_id: $id,
            name: $request->name,
            url: $request->url
        );

        return response()->json(['success' => 'Сайт обновлен'], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Jobs\Delete::dispatchSync($id);
        return response()->json(['success' => 'Сайт удален'], Response::HTTP_OK);
    }
}
