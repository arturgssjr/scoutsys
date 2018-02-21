<?php

namespace scoutsys\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use scoutsys\Interfaces\DetailRepository;
use scoutsys\Models\Detail;
use scoutsys\Validators\DetailValidator;

/**
 * Class DetailRepositoryEloquent.
 *
 * @package namespace scoutsys\Repositories;
 */
class DetailRepositoryEloquent extends BaseRepository implements DetailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Detail::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DetailValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
