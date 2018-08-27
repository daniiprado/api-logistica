<?php

namespace Logistic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as Auditor;

class Module extends Model implements Auditable
{
    use SoftDeletes, Auditor;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name' ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'  =>  'string'
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
        'name',
    ];

    /**
     * Generating tags for each model audited.
     *
     * @return array
     */
    public function generateTags() : array
    {
        return ['module'];
    }

    /*
     * ---------------------------------------------------------
     * Eloquent Relationship
     * ---------------------------------------------------------
     */

    /**
     * Modules has many submodules
     *
     * @Relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submodules()
    {
        return $this->hasMany( Submodule::class );
    }
}
