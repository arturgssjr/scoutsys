<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Status;

/**
 * Class StatusTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class StatusTransformer extends TransformerAbstract
{
    /**
     * Transform the Status entity.
     *
     * @param \scoutsys\Models\Status $model
     *
     * @return array
     */
    public function transform(Status $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
