<?php

namespace scoutsys\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categoryable extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    
}
