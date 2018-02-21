<?php

namespace scoutsys\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use scoutsys\Interfaces\DetailableRepository;
use scoutsys\Models\Detailable;
use scoutsys\Validators\DetailableValidator;

/**
 * Class DetailableRepositoryEloquent.
 *
 * @package namespace scoutsys\Repositories;
 */
class DetailableRepositoryEloquent extends BaseRepository implements DetailableRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Detailable::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DetailableValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
