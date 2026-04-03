<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Guarded(['id'])]
class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory, HasUlids, SoftDeletes;

    public function categoryable(): MorphTo
    {
        return $this->morphTo();
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'categoryable');
    }

    public function teams(): MorphToMany
    {
        return $this->morphedByMany(Team::class, 'categoryable');
    }
}
