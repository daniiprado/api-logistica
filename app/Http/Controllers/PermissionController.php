<?php

namespace Logistic\Http\Controllers;

use Logistic\Http\Requests\StorePermissionRequest;
use Logistic\Http\Requests\UpdatePermissionRequest;
use Logistic\Http\Resources\PermissionResource;
use Logistic\Permission;

class PermissionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->collectionResponse(
            PermissionResource::collection( Permission::paginate( 15 ) ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePermissionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = new Permission;
        $permission->save( $request->all() );
        return $this->singleResponse(
            new PermissionResource( $permission ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return $this->singleResponse(
            new PermissionResource( $permission ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermissionRequest $request
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update( $request->all() );
        return $this->singleResponse(
            new PermissionResource( $permission ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return $this->singleResponse(
            new PermissionResource( $permission ),
            200
        );
    }
}
