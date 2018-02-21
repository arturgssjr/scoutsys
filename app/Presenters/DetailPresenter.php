<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\DetailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DetailsPresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class DetailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DetailTransformer();
    }
}
