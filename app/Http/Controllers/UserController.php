<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Nette\NotImplementedException;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\SectionResource;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\GenericCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericCollection(User::with('sections')->get(), 'users.index', collects: UserResource::class);
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

    public function showSections(Request $request, User $user)
    {
        $date = $request->date('date');
        if($date === null)
            $date = Carbon::today();
            
        return new GenericCollection(
            $user->sections()
                 ->wherePivot('created_at', '<=', $date)
                 ->wherePivot('expires_on', '>=', $date)
                 ->get(), 
            route('users.sections', $user),
            collects: SectionResource::class,
        );
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
