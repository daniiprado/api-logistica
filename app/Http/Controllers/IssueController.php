<?php

namespace Logistic\Http\Controllers;

use Illuminate\Http\Request;
use Logistic\Http\Requests\StoreIssueRequest;
use Logistic\Http\Requests\UpdateIssueRequest;
use Logistic\Http\Resources\IssueResource;
use Logistic\Issue;

class IssueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->collectionResponse(
            IssueResource::collection( new Issue ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIssueRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreIssueRequest $request)
    {
        $issue = new Issue;
        $issue->save( $request->all() );
        return $this->singleResponse(
            new IssueResource( $issue ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Issue $issue
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Issue $issue)
    {
        return $this->singleResponse(
            new IssueResource( $issue ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIssueRequest $request
     * @param Issue $issue
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        $issue->update( $request->all() );
        return $this->singleResponse(
            new IssueResource( $issue ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Issue $issue
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return $this->singleResponse(
            new IssueResource( $issue ),
            200
        );
    }
}
