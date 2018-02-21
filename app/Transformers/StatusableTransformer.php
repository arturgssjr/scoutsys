<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Statusable;

/**
 * Class StatusableTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class StatusableTransformer extends TransformerAbstract
{
    /**
     * Transform the Statusable entity.
     *
     * @param \scoutsys\Models\Statusable $model
     *
     * @return array
     */
    public function transform(Statusable $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
