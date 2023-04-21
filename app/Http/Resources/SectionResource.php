<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'self' => route('sections.show', $this->resource),
            'kind' => 'Section',
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'is_free' => $this->resource->is_free,
        ];
    }
}
