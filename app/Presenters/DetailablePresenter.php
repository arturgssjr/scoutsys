<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\DetailableTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DetailablePresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class DetailablePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DetailableTransformer();
    }
}
