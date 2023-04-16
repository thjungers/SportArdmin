<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'self' => route('sessions.show', $this->resource),
            'kind' => 'Session',
            'id' => $this->resource->id,
            'section' => $this->when( // do not include the section if this is a section route
                !str_starts_with(Route::currentRouteName(), 'section'), 
                fn() => new GenericResource($this->resource->section)
            ),
            'starts_at' => $this->resource->starts_at,
            'ends_at' => $this->resource->ends_at,
        ];
    }
}
