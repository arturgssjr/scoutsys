<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\PlayerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PlayerPresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class PlayerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PlayerTransformer();
    }
}
