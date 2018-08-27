<?php

namespace Logistic\Http\Controllers;

use Logistic\Traits\ApiResponse;

class ApiController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('auth:api');
    }
}
