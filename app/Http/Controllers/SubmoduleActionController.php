<?php

namespace Logistic\Http\Controllers;

use Illuminate\Http\Request;
use Logistic\Http\Requests\StoreSubmoduleActionRequest;
use Logistic\Http\Requests\UpdateSubmoduleActionRequest;
use Logistic\Http\Resources\SubmoduleActionResource;
use Logistic\SubmoduleAction;

class SubmoduleActionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->collectionResponse(
            SubmoduleActionResource::collection( SubmoduleAction::paginate( 15 ) ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubmoduleActionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSubmoduleActionRequest $request)
    {
        $submodule_action = new SubmoduleAction();
        $submodule_action->save( $request->all() );
        return $this->singleResponse(
            new SubmoduleActionResource( $submodule_action ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param SubmoduleAction $submodule_action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(SubmoduleAction $submodule_action)
    {
        return $this->singleResponse(
            new SubmoduleActionResource( $submodule_action ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubmoduleActionRequest $request
     * @param SubmoduleAction $submodule_action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateSubmoduleActionRequest $request, SubmoduleAction $submodule_action)
    {
        $submodule_action->update( $request->all() );
        return $this->singleResponse(
            new SubmoduleActionResource( $submodule_action ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubmoduleAction $submodule_action
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(SubmoduleAction $submodule_action)
    {
        $submodule_action->delete();
        return $this->singleResponse(
            new SubmoduleActionResource( $submodule_action ),
            200
        );
    }
}
