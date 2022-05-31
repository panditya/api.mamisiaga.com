<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Immunization\StoreRequest;
use App\Http\Requests\Admin\Immunization\UpdateRequest;
use App\Http\Resources\Admin\ImmunizationResource;
use App\Models\Immunization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ImmunizationController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $immunizations = Immunization::all();

        return ImmunizationResource::collection($immunizations);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        Immunization::create($request->all());

        return new JsonResponse(null, 201);
    }

    public function show(Immunization $immunization): ImmunizationResource
    {
        return new ImmunizationResource($immunization);
    }

    public function update(UpdateRequest $request, Immunization $immunization): ImmunizationResource
    {
        $immunization->update($request->all());

        return new ImmunizationResource($immunization);
    }

    public function destroy(Immunization $immunization): JsonResponse
    {
        $immunization->delete();

        return new JsonResponse(null, 204);
    }
}
