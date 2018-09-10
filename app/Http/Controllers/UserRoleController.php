<?php

namespace Logistic\Http\Controllers;

use Logistic\Http\Requests\StoreUserRoleRequest;
use Logistic\Http\Requests\UpdateUserRoleRequest;
use Logistic\Http\Resources\UserResource;
use Logistic\Role;
use Logistic\User;

class UserRoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(User $user)
    {
        return $this->singleResponse(
            new UserResource( $user->with([
                'roles' => function ($query) {
                    return $query->with('permissions');
                }
            ])->get() ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRoleRequest $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRoleRequest $request, User $user)
    {
        $user->attachRole( $request->get('roles') );
        return $this->singleResponse(
            new UserResource( $user->with([
                'roles' => function ($query) {
                    return $query->with('permissions');
                }
            ]) ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user, Role $role)
    {
        return $this->singleResponse(
            new UserResource( $user->with([
                'roles' => function ($query) use ($role) {
                    return $query->with('permissions')->find( $role->id );
                }
            ])),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRoleRequest $request
     * @param User $user
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRoleRequest $request, User $user, Role $role)
    {
        $user->attachRole( $role );

        return $this->singleResponse(
            new UserResource( $user->with([
                'roles' => function ($query) {
                    return $query->with('permissions');
                }
            ])),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user, Role $role)
    {
        $user->detachRole( $role );
        return $this->singleResponse(
            new UserResource( $user->with([
                'roles' => function ($query) {
                    return $query->with('permissions');
                }
            ])),
            200
        );
    }
}
