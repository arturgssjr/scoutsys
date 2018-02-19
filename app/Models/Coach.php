<?php

namespace scoutsys\Models;

use scoutsys\Models\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Coach.
 *
 * @package namespace scoutsys\Models;
 */
class Coach extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
