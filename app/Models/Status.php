<?php

namespace scoutsys\Models;

use scoutsys\Models\Team;
use scoutsys\Models\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Status.
 *
 * @package namespace scoutsys\Models;
 */
class Status extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description'];

    public function statusable()
    {
        return $this->morphTo();
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'statusable');
    }

    public function teams()
    {
        return $this->morphedByMany(Team::class, 'statusable');
    }
}
