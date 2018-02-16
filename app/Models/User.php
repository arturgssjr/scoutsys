<?php

namespace scoutsys\Models;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function profiles() {
        return $this->belongsToMany(Profile::class)->withTimestamps();
    }

    public function admins() {
        return $this->belongsToMany(Profile::class)->wherePivot('profile_id', 1);
    }

    public function coachs() {
        return $this->belongsToMany(Profile::class)->wherePivot('profile_id', 2);
    }

    public function players() {
        return $this->belongsToMany(Profile::class)->wherePivot('profile_id', 3);
    }

    public function team() {
        return $this->belongsTo(Team::class);
    }

}
