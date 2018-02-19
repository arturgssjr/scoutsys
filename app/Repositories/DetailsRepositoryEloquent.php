<?php

namespace scoutsys\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use scoutsys\Interfaces\DetailsRepository;
use scoutsys\Models\Details;
use scoutsys\Validators\DetailsValidator;

/**
 * Class DetailsRepositoryEloquent.
 *
 * @package namespace scoutsys\Repositories;
 */
class DetailsRepositoryEloquent extends BaseRepository implements DetailsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Details::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DetailsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
