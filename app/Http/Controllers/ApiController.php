<?php

namespace Logistic\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Logistic\Rules\OrderBy;
use Logistic\Traits\ApiResponse;

class ApiController extends Controller
{
    use ApiResponse;

    /**
     * The attribute to include into pagination resources
     *
     * @var int
     */
    protected $per_page;

    /**
     * The attribute to include into order function
     *
     * @var string
     */
    protected $order_by;

    /**
     * The attribute to order collection ascending or descending
     *
     * @var string
     */
    protected $direction;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        Validator::validate( request()->all(), [
            'per_page'   =>  'integer|min:2|max:50',
            'order_by'   =>  'string|min:2|max:20',
            'direction'  =>  ['string', new OrderBy],
        ]);
        $this->middleware('auth:api');
        $this->per_page = $this->getPerPageAttribute();
        $this->order_by = $this->getOrderByAttribute();
        $this->direction = $this->getDirectionAttribute();
    }

    /**
     * Check and get the pagination quantity number
     *
     * @return int
     */
    protected function getPerPageAttribute()
    {
        return ( request()->has('per_page') ) ? (int) request()->get('per_page') : 15;
    }

    /**
     * Check and get the data ordering by specific column
     *
     * @return string
     */
    protected function getOrderByAttribute()
    {
         return ( request()->has('order_by') ) ? (string) request()->get('order_by') : 'id';
    }

    /**
     * Check and get the data ordering direction
     *
     * @return string
     */
    protected function getDirectionAttribute()
    {
         return ( request()->has('direction') ) ? (string) request()->get('direction') : 'asc';
    }

    protected function getModel(Model $model)
    {
        $collection = ( $this->direction === 'asc' ) ? $model->orderBy( $this->order_by ) : $model->orderByDesc( $this->order_by );
        return $collection->paginate( $this->per_page );
    }
}
