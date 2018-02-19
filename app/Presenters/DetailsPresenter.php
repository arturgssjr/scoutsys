<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\DetailsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DetailsPresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class DetailsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DetailsTransformer();
    }
}
