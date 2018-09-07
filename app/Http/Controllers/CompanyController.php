<?php

namespace Logistic\Http\Controllers;

use Logistic\Company;
use Logistic\Http\Requests\StoreCompanyRequest;
use Logistic\Http\Requests\UpdateCompanyRequest;
use Logistic\Http\Resources\Companies;
use Logistic\Http\Resources\CompanyResource;

class CompanyController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return CompanyController
     */
    public function index()
    {
        return $this->collectionResponse(
            CompanyResource::collection(
                Company::with( $this->relations )
                        ->orderBy($this->order_by, $this->direction)
                        ->paginate( $this->per_page )
            ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCompanyRequest $request
     * @return CompanyController
     * @throws \Throwable
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = new Company;
        $company->save( $request->all() );
        return $this->singleResponse(
            new CompanyResource( $company ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return CompanyController
     */
    public function show(Company $company)
    {
        return $this->singleResponse(
            new CompanyResource( $company ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return CompanyController
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update( $request->all() );
        return $this->singleResponse(
            new CompanyResource( $company ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return CompanyController
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return $this->singleResponse(
            new CompanyResource( $company ),
            200
        );
    }
}
