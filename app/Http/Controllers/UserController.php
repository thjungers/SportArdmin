<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Nette\NotImplementedException;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\GenericResource;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\GenericCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericCollection(User::all(), 'users.index', collects: UserResource::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        throw new NotImplementedException();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function showSections(User $user)
    {
        return new GenericCollection($user->sections, route('users.sections', $user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        throw new NotImplementedException();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        throw new NotImplementedException();
    }
}
