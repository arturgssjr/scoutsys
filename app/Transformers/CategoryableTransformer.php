<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Categoryable;

/**
 * Class CategoryableTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class CategoryableTransformer extends TransformerAbstract
{
    /**
     * Transform the Categoryable entity.
     *
     * @param \scoutsys\Models\Categoryable $model
     *
     * @return array
     */
    public function transform(Categoryable $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
