<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\StatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatusPresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class StatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StatusTransformer();
    }
}
