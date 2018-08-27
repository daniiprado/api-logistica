<?php

namespace Logistic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as Auditor;

class Product extends Model implements Auditable
{
    use SoftDeletes, Auditor;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'stock',
        'price',
        'company_id',
        'expired_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'code'          =>  'string',
        'name'          =>  'string',
        'stock'         =>  'integer',
        'price'         =>  'double',
        'company_id'    =>  'integer',
        'expired_at'    =>  'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['expired_at'];

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
        'code',
        'name',
        'stock',
        'price',
        'company_id',
        'expired_at',
    ];

    /**
     * Generating tags for each model audited.
     *
     * @return array
     */
    public function generateTags() : array
    {
        return ['product'];
    }

    /*
     * ---------------------------------------------------------
     * Eloquent Relationship
     * ---------------------------------------------------------
     */

    /**
     * Products belongs to one company
     *
     * @Relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo( Company::class );
    }

    /**
     * Order product has many issues
     *
     * @Relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products_order()
    {
        return $this->hasMany( ProductsOrder::class );
    }
}
