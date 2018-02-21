<?php

namespace scoutsys\Models;

use scoutsys\Models\Team;
use scoutsys\Models\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Detail.
 *
 * @package namespace scoutsys\Models;
 */
class Detail extends Model implements Transformable
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

    public function detailable()
    {
        return $this->morphTo();
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'detailable');
    }

    public function teams()
    {
        return $this->morphedByMany(Team::class, 'detailable');
    }
}
