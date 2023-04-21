<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Http\Resources\GenericCollection;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Http\Resources\SectionResource;
use Nette\NotImplementedException;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericCollection(Section::all(), route('sections.index'), collects: SectionResource::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        throw new NotImplementedException();
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return new SectionResource($section);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        throw new NotImplementedException();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        throw new NotImplementedException();
    }
}
