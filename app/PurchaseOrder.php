<?php

namespace Logistic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as Auditor;

class PurchaseOrder extends Model implements Auditable
{
    use SoftDeletes, Auditor;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'delivery_address',
        'delivery_at',
        'requested_at',
        'status_id',
        'user_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'delivery_address'  =>  'string',
        'delivery_at'       =>  'datetime',
        'requested_at'      =>  'datetime',
        'status_id'         =>  'integer',
        'user_id'           =>  'integer',
    ];

    /*
     * ---------------------------------------------------------
     * Audits
     * ---------------------------------------------------------
     */

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'delivery_address',
        'delivery_at',
        'requested_at',
        'status_id',
        'user_id',
    ];

    /**
     * Generating tags for each model audited.
     *
     * @return array
     */
    public function generateTags() : array
    {
        return ['purchase_order'];
    }

    /*
     * ---------------------------------------------------------
     * Eloquent Relationship
     * ---------------------------------------------------------
     */

    /**
     * Purchase order has many products order
     *
     * @Relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products_order()
    {
        return $this->hasMany( ProductsOrder::class );
    }

    /**
     * Purchase order belongs to one status
     *
     * @Relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo( Status::class );
    }

    /**
     * Purchase order belongs to one user
     *
     * @Relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo( User::class );
    }
}
