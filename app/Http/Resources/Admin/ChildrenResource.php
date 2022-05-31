<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ChildrenResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
