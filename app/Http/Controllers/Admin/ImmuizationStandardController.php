<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImmunizationStandard\StoreRequest;
use App\Http\Requests\Admin\ImmunizationStandard\UpdateRequest;
use App\Http\Resources\Admin\ImmunizationStandardResource;
use App\Models\Immunization;
use App\Models\ImmunizationStandard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ImmunizationStandardController extends Controller
{
    public function index(Request $request, Immunization $immunization): AnonymousResourceCollection
    {
        $immunizations = $immunization->standards;

        return ImmunizationStandardResource::collection($immunizations);
    }

    public function store(StoreRequest $request, Immunization $immunization): JsonResponse
    {
        $immunization->standards()->create($request->all());

        return new JsonResponse(null, 201);
    }

    public function show(Immunization $immunization, ImmunizationStandard $immunizationStandard): ImmunizationStandardResource
    {
        return new ImmunizationStandardResource($immunizationStandard);
    }

    public function update(UpdateRequest $request, Immunization $immunization, ImmunizationStandard $immunizationStandard): ImmunizationStandardResource
    {
        $immunizationStandard->update($request->all());

        return new ImmunizationStandardResource($immunization);
    }

    public function destroy(Immunization $immunization, ImmunizationStandard $immunizationStandard): JsonResponse
    {
        $immunizationStandard->delete();

        return new JsonResponse(null, 204);
    }
}
