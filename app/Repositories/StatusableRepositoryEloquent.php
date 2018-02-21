<?php

namespace scoutsys\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use scoutsys\Interfaces\StatusableRepository;
use scoutsys\Models\Statusable;
use scoutsys\Validators\StatusableValidator;

/**
 * Class StatusableRepositoryEloquent.
 *
 * @package namespace scoutsys\Repositories;
 */
class StatusableRepositoryEloquent extends BaseRepository implements StatusableRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Statusable::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StatusableValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
