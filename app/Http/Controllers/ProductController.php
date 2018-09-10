<?php

namespace Logistic\Http\Controllers;

use Logistic\Http\Requests\StoreProductRequest;
use Logistic\Http\Requests\UpdateProductRequest;
use Logistic\Http\Resources\ProductResource;
use Logistic\Product;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->collectionResponse(
            ProductResource::collection( new Product ),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->save( $request->all() );
        return $this->singleResponse(
            new ProductResource( $product ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        return $this->singleResponse(
            new ProductResource( $product ),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update( $request->all() );
        return $this->singleResponse(
            new ProductResource( $product ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->singleResponse(
            new ProductResource( $product ),
            200
        );
    }
}
