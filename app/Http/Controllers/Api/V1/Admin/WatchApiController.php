<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWatchRequest;
use App\Http\Requests\UpdateWatchRequest;
use App\Http\Resources\Admin\WatchResource;
use App\Models\Watch;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WatchApiController extends Controller
{
    public function index()
    {

        return new WatchResource(Watch::with(['category'])->get());
    }

    public function store(StoreWatchRequest $request)
    {
        $watch = Watch::create($request->all());

        return (new WatchResource($watch))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Watch $watch)
    {

        return new WatchResource($watch->load(['category']));
    }

    public function update(UpdateWatchRequest $request, Watch $watch)
    {
        $watch->update($request->all());

        return (new WatchResource($watch))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Watch $watch)
    {

        $watch->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
