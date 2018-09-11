<?php

namespace Logistic\Http\Controllers;

use Logistic\Http\Requests\StoreUserRequest;
use Logistic\Http\Requests\UpdateUserRequest;
use Logistic\Http\Resources\UserResource;
use Logistic\User;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->collectionResponse(
            UserResource::collection( $this->getModel( new User ) ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->save( $request->all() );
        return $this->singleResponse(
            new UserResource( $user ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $this->singleResponse(
            new UserResource( $user ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update( $request->all() );
        return $this->singleResponse(
            new UserResource( $user ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->singleResponse(
            new UserResource( $user ),
            200
        );
    }
}
