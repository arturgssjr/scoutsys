<?php

namespace scoutsys\Models;

use scoutsys\Models\Team;
use scoutsys\Models\Status;
use scoutsys\Models\Details;
use scoutsys\Models\Category;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use Notifiable;
    use SoftDeletes;
    use TransformableTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'birth',
        'nickname',
        'permission'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function statuses()
    {
        return $this->morphToMany(Status::class, 'statusable');
    }

    public function details()
    {
        return $this->morphToMany(Details::class, 'detailable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
