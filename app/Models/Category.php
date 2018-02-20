<?php

namespace scoutsys\Models;

use Illuminate\Database\Eloquent\Model;
use scoutsys\Models\Team;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Category.
 *
 * @package namespace scoutsys\Models;
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
