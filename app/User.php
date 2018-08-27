<?php

namespace Logistic;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use OwenIt\Auditing\Auditable as Auditor;

class User extends Authenticatable implements Auditable
{
    use Notifiable, HasApiTokens, SoftDeletes, Auditor, EntrustUserTrait {
        EntrustUserTrait::restore insteadof SoftDeletes;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'        =>  'string',
        'email'       =>  'string',
        'password'    =>  'string',
        'company_id'  =>  'integer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name',
        'email',
    ];
    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'password',
    ];

    /**
     * Generating tags for each model audited.
     *
     * @return array
     */
    public function generateTags() : array
    {
        return ['user'];
    }

    /*
     * ---------------------------------------------------------
     * Eloquent Relationship
     * ---------------------------------------------------------
     */

    /**
     * Users belongs to one company
     *
     * @Relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo( Company::class );
    }

    /**
     * User has many purchase order
     *
     * @Relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases_orders()
    {
        return $this->hasMany( PurchaseOrder::class );
    }
}
