<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GenericResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // The route for Model is expected to be "models.show", with parameter "model"
        $class = explode('\\', get_class($this->resource));
        $kind = end($class);
        $routeParamName = strtolower($kind);
        $routeName = strtolower($kind) . 's.show';

        return array_merge(
            [
                'self' => route($routeName, [$routeParamName => $this->resource]),
                'kind' => $kind,
            ],
            $this->resource->toArray()
        );
    }
}
