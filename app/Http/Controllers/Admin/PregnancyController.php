<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pregnancy\StoreRequest;
use App\Http\Requests\Admin\Pregnancy\UpdateRequest;
use App\Http\Resources\Admin\PregnancyResource;
use App\Models\Mother;
use App\Models\Pregnancy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PregnancyController extends Controller
{
    public function index(Request $request, Mother $mother): AnonymousResourceCollection
    {
        $pregnancies = $mother->pregnancies;

        return PregnancyResource::collection($pregnancies);
    }

    public function store(StoreRequest $request, Mother $mother): JsonResponse
    {
        $mother->pregnancies()->create($request->all());

        return new JsonResponse(null, 201);
    }

    public function show(Mother $mother, Pregnancy $pregnancy): PregnancyResource
    {
        return new PregnancyResource($pregnancy);
    }

    public function update(UpdateRequest $request, Mother $mother, Pregnancy $pregnancy): PregnancyResource
    {
        $pregnancy->update($request->all());

        return new PregnancyResource($pregnancy);
    }

    public function destroy(Mother $mother, Pregnancy $pregnancy): JsonResponse
    {
        $pregnancy->delete();

        return new JsonResponse(null, 204);
    }
}
