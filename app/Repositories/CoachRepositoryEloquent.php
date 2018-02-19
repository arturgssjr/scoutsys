<?php

namespace scoutsys\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use scoutsys\Interfaces\CoachRepository;
use scoutsys\Models\Coach;
use scoutsys\Validators\CoachValidator;

/**
 * Class CoachRepositoryEloquent.
 *
 * @package namespace scoutsys\Repositories;
 */
class CoachRepositoryEloquent extends BaseRepository implements CoachRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Coach::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CoachValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
