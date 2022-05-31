<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mother\StoreRequest;
use App\Http\Requests\Admin\Mother\UpdateRequest;
use App\Http\Resources\Admin\MotherResource;
use App\Models\Mother;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MotherController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $mothers = Mother::all();

        return MotherResource::collection($mothers);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        Mother::create($request->all());

        return new JsonResponse(null, 201);
    }

    public function show(Mother $mother): MotherResource
    {
        return new MotherResource($mother);
    }

    public function update(UpdateRequest $request, Mother $mother): MotherResource
    {
        $mother->update($request->all());

        return new MotherResource($mother);
    }

    public function destroy(Mother $mother): JsonResponse
    {
        $mother->delete();

        return new JsonResponse(null, 204);
    }
}
