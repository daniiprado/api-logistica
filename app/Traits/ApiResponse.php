<?php

namespace Logistic\Traits;

use Illuminate\Http\Resources\Json\JsonResource;

trait ApiResponse
{
    private function success( $data, $code = 200 ){
        return response()->json( $data, $code );
    }

    protected function errorResponse( $message, $code = 422 )
    {
        return response()->json([
            'error' =>  $message,
            'code'  =>  $code
        ], $code);
    }

    /**
     * @param JsonResource $collection
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function collectionResponse(JsonResource $collection, int $code = 200 )
    {
        return $collection->response()->setStatusCode( $code );
    }

    /**
     * @param JsonResource $instance
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function singleResponse(JsonResource $instance, int $code = 200)
    {
        return $instance->response()->setStatusCode( $code );
    }
}