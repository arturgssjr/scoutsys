<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Coach;

/**
 * Class CoachTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class CoachTransformer extends TransformerAbstract
{
    /**
     * Transform the Coach entity.
     *
     * @param \scoutsys\Models\Coach $model
     *
     * @return array
     */
    public function transform(Coach $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
