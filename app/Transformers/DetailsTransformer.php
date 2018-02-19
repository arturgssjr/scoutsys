<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Details;

/**
 * Class DetailsTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class DetailsTransformer extends TransformerAbstract
{
    /**
     * Transform the Details entity.
     *
     * @param \scoutsys\Models\Details $model
     *
     * @return array
     */
    public function transform(Details $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
