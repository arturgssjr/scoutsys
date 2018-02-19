<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\CoachTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CoachPresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class CoachPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CoachTransformer();
    }
}
