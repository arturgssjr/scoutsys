<?php

namespace scoutsys\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Details.
 *
 * @package namespace scoutsys\Models;
 */
class Details extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'phone',
        'zipcode',
        'photo',
        'city',
        'state'
    ];

    public function details(){
        return $this->morphTo();
    }

}
