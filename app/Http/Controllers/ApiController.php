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
     * The attribute to order collection ascending or descending
     *
     * @var string
     */
    protected $query;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        Validator::validate( request()->all(), [
            'query'      =>  'nullable|string',
            'per_page'   =>  'nullable|integer|min:2|max:100',
            'order_by'   =>  'nullable|string|min:2|max:20',
            'direction'  =>  ['nullable', 'string', new OrderBy],
        ]);
        $this->middleware('auth:api');
        $this->per_page = $this->getPerPageAttribute();
        $this->order_by = $this->getOrderByAttribute();
        $this->direction = $this->getDirectionAttribute();
        $this->query = $this->getQueryAttribute();
    }

    /**
     * Check and get the pagination quantity number
     *
     * @return int
     */
    protected function getPerPageAttribute()
    {
        return ( request()->has('per_page') ) ? (int) request()->get('per_page') : 2;
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

    /**
     * Check and get the data ordering direction
     *
     * @return string
     */
    protected function getQueryAttribute()
    {
         return ( request()->has('query') ) ? (string) request()->get('query') : null;
    }

    /**
     * @param $query
     * @return bool
     */
    protected function queryHasPipe($query )
    {
        return ( strpos( $query, '|') === false ) ? false : true;
    }

    /**
     * @param $query
     * @return bool
     */
    protected function queryHasNotPipe($query )
    {
        return ! $this->queryHasPipe( $query );
    }

    protected function modelHasColumn( $column, array $columns = [] )
    {
        return in_array( $column, $columns );
    }

    protected function getModel(Model $model, array $relations = [])
    {
        $order_by = ( $this->modelHasColumn( $this->order_by, $model->getFillable() ) ) ? $this->order_by : 'id';
        $collection = ( $this->direction === 'asc' ) ? $model->orderBy( $order_by ) : $model->orderByDesc( $order_by );
        if ( $this->query && $this->queryHasNotPipe( $this->query ) ) {
            foreach ( $model->getFillable() as $column ) {
                $collection->orWhere( $column, 'LIKE', '%' . $this->query . '%' );
            }
        } else {
            $query = explode('|', $this->query);
            $column = isset( $query[0] ) ? $query[0] : 'id';
            $value = isset( $query[1] ) ? $query[1] : '';
            $collection = ( $this->modelHasColumn( $column, $model->getFillable() ) )
                        ? $collection->where( $column, 'LIKE', '%' . $value . '%' )
                        : $collection;
        }

        if ( count( $relations ) > 0 ) {
            $collection = $collection->with( $relations );
        }

        return $collection->paginate( $this->per_page );
    }
}
