<?php

namespace Logistic\Http\Controllers;

use Logistic\Http\Requests\StoreStatusRequest;
use Logistic\Http\Requests\UpdateStatusRequest;
use Logistic\Http\Resources\StatusResource;
use Logistic\Status;

class StatusController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->collectionResponse(
            StatusResource::collection( Status::paginate( 15 ) ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStatusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreStatusRequest $request)
    {
        $status = new Status();
        $status->save( $request->all() );
        return $this->singleResponse(
            new StatusResource( $status ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Status $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Status $status)
    {
        return $this->singleResponse(
            new StatusResource( $status ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStatusRequest $request
     * @param Status $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->update( $request->all() );
        return $this->singleResponse(
            new StatusResource( $status ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return $this->singleResponse(
            new StatusResource( $status ),
            200
        );
    }
}
