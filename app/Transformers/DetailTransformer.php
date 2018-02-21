<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Detail;

/**
 * Class DetailTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class DetailTransformer extends TransformerAbstract
{
    /**
     * Transform the Detail entity.
     *
     * @param \scoutsys\Models\Detail $model
     *
     * @return array
     */
    public function transform(Detail $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
