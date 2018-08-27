<?php

namespace Logistic\Http\Controllers;

use Logistic\Http\Requests\StoreModuleRequest;
use Logistic\Http\Requests\UpdateModuleRequest;
use Logistic\Http\Resources\ModuleResource;
use Logistic\Module;

class ModuleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->collectionResponse(
            ModuleResource::collection( Module::paginate( 15 ) ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreModuleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModuleRequest $request)
    {
        $module = new Module;
        $module->save( $request->all() );
        return $this->singleResponse(
            new ModuleResource( $module ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Module $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return $this->singleResponse(
            new ModuleResource( $module ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateModuleRequest $request
     * @param Module $module
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModuleRequest $request, Module $module)
    {
        $module->update( $request->all() );
        return $this->singleResponse(
            new ModuleResource( $module ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Module $module
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return $this->singleResponse(
            new ModuleResource( $module ),
            200
        );
    }
}
