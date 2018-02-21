<?php

namespace scoutsys\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use scoutsys\Interfaces\CategoryableRepository;
use scoutsys\Models\Categoryable;
use scoutsys\Validators\CategoryableValidator;

/**
 * Class CategoryableRepositoryEloquent.
 *
 * @package namespace scoutsys\Repositories;
 */
class CategoryableRepositoryEloquent extends BaseRepository implements CategoryableRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categoryable::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CategoryableValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
