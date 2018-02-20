<?php

namespace scoutsys\Models;

use Carbon\Carbon;
use scoutsys\Models\Status;
use scoutsys\Models\Details;
use scoutsys\Models\Category;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace scoutsys\Models;
 */
class User extends Authenticatable implements Transformable
{
    use Notifiable;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth',
        'nickname',
        'permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function status()
    {
        return $this->morphMany(Status::class, 'status');
    }

    public function details()
    {
        return $this->morphMany(Details::class, 'details');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
