<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pregnancy\StoreRequest;
use App\Http\Requests\Admin\Pregnancy\UpdateRequest;
use App\Http\Resources\Admin\PregnancyResource;
use App\Models\Pregnancy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PregnancyController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $pregnancies = Pregnancy::all();

        return PregnancyResource::collection($pregnancies);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        Pregnancy::create($request->all());

        return new JsonResponse(null, 201);
    }

    public function show(Pregnancy $pregnancy): PregnancyResource
    {
        return new PregnancyResource($pregnancy);
    }

    public function update(UpdateRequest $request, Pregnancy $pregnancy): PregnancyResource
    {
        $pregnancy->update($request->all());

        return new PregnancyResource($pregnancy);
    }

    public function destroy(Pregnancy $pregnancy): JsonResponse
    {
        $pregnancy->delete();

        return new JsonResponse(null, 204);
    }
}
