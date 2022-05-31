<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChildrenBodyMassIndex\StoreRequest;
use App\Http\Requests\Admin\ChildrenBodyMassIndex\UpdateRequest;
use App\Http\Resources\Admin\ChildrenBodyMassIndexResource;
use App\Models\Children;
use App\Models\ChildrenBodyMassIndex;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChildrenBodyMassIndexController extends Controller
{
    public function index(Request $request, Children $children): AnonymousResourceCollection
    {
        $childrenBodyMassIndexBodyMassIndices = $children->bodyMassIndices;

        return ChildrenBodyMassIndexResource::collection($childrenBodyMassIndexBodyMassIndices);
    }

    public function store(StoreRequest $request, Children $children): JsonResponse
    {
        $children->bodyMassIndices()->create($request->all());

        return new JsonResponse(null, 201);
    }

    public function show(Children $children, ChildrenBodyMassIndex $childrenBodyMassIndex): ChildrenBodyMassIndexResource
    {
        return new ChildrenBodyMassIndexResource($childrenBodyMassIndex);
    }

    public function update(UpdateRequest $request, Children $children, ChildrenBodyMassIndex $childrenBodyMassIndex): ChildrenBodyMassIndexResource
    {
        $childrenBodyMassIndex->update($request->all());

        return new ChildrenBodyMassIndexResource($childrenBodyMassIndex);
    }

    public function destroy(Children $children, ChildrenBodyMassIndex $childrenBodyMassIndex): JsonResponse
    {
        $childrenBodyMassIndex->delete();

        return new JsonResponse(null, 204);
    }
}
