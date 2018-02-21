<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\StatusableTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatusablePresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class StatusablePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StatusableTransformer();
    }
}
