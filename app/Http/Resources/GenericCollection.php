<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GenericCollection extends ResourceCollection
{
    public $route;

    public function __construct($resource, $route, $collects = null)
    {        
        $this->route = $route;

        if($collects !== null) {
            $this->collects = $collects;
        }

        parent::__construct($resource);
    }
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'self' => $this->route,
            'kind' => 'Collection',
            'count' => $this->collection->count(),
            'contents' => $this->collection,
        ];
    }
}
