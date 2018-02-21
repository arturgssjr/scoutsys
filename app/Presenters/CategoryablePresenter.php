<?php

namespace scoutsys\Presenters;

use scoutsys\Transformers\CategoryableTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryablePresenter.
 *
 * @package namespace scoutsys\Presenters;
 */
class CategoryablePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryableTransformer();
    }
}
