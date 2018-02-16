<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\TeamTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TeamPresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class TeamPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TeamTransformer();
    }
}
