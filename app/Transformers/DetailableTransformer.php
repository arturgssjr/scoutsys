<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Detailable;

/**
 * Class DetailableTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class DetailableTransformer extends TransformerAbstract
{
    /**
     * Transform the Detailable entity.
     *
     * @param \scoutsys\Models\Detailable $model
     *
     * @return array
     */
    public function transform(Detailable $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
