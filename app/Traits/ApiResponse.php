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

    protected function collectionResponse( JsonResource $collection, $code = 200 )
    {
        return $collection->response()->setStatusCode( $code );
    }

    protected function singleResponse(JsonResource $instance, $code = 200)
    {
        return $instance->response()->setStatusCode( $code );
    }
}