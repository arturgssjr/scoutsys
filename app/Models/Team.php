<?php

namespace scoutsys\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Team.
 *
 * @package namespace scoutsys\Models;
 */
class Team extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'foundation'
    ];

    public function users()
    {
        return $this->HasMany(User::class);
    }
}
