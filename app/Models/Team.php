<?php

namespace scoutsys\Models;

use scoutsys\Models\Category;
use scoutsys\Models\Customer;
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
        'foundation',
        'category_id'
    ];

    public function users()
    {
        return $this->HasMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
