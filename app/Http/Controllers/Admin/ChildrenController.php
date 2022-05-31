<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Children\StoreRequest;
use App\Http\Requests\Admin\Children\UpdateRequest;
use App\Http\Resources\Admin\ChildrenResource;
use App\Models\Children;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChildrenController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $childrens = Children::all();

        return ChildrenResource::collection($childrens);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        Children::create($request->all());

        return new JsonResponse(null, 201);
    }

    public function show(Children $children): ChildrenResource
    {
        return new ChildrenResource($children);
    }

    public function update(UpdateRequest $request, Children $children): ChildrenResource
    {
        $children->update($request->all());

        return new ChildrenResource($children);
    }

    public function destroy(Children $children): JsonResponse
    {
        $children->delete();

        return new JsonResponse(null, 204);
    }
}
