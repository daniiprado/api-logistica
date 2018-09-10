<?php

namespace Logistic\Http\Controllers;


use Logistic\Http\Requests\StoreSubmoduleRequest;
use Logistic\Http\Requests\UpdateSubmoduleRequest;
use Logistic\Http\Resources\SubmoduleResource;
use Logistic\Submodule;

class SubmoduleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->collectionResponse(
            SubmoduleResource::collection( new Submodule ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubmoduleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSubmoduleRequest $request)
    {
        $submodule = new Submodule();
        $submodule->save( $request->all() );
        return $this->singleResponse(
            new SubmoduleResource( $submodule ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Submodule $submodule
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Submodule $submodule)
    {
        return $this->singleResponse(
            new SubmoduleResource( $submodule ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubmoduleRequest $request
     * @param Submodule $submodule
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateSubmoduleRequest $request, Submodule $submodule)
    {
        $submodule->update( $request->all() );
        return $this->singleResponse(
            new SubmoduleResource( $submodule ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Submodule $submodule
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Submodule $submodule)
    {
        $submodule->delete();
        return $this->singleResponse(
            new SubmoduleResource( $submodule ),
            200
        );
    }
}
