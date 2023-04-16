<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Nette\NotImplementedException;
use App\Http\Resources\SessionResource;
use App\Http\Resources\GenericCollection;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Section;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAll()
    {
        return new GenericCollection(Session::all(), route('sessions.index'), collects: SessionResource::class);
    }

    public function index(Section $section)
    {
        return new GenericCollection($section->sessions, route('sections.sessions.index', $section), collects: SessionResource::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSessionRequest $request, Section $section)
    {
        throw new NotImplementedException();
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        return new SessionResource($session);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        throw new NotImplementedException();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        throw new NotImplementedException();
    }
}
