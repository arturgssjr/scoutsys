<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Category;

/**
 * Class CategoryTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the Category entity.
     *
     * @param \scoutsys\Models\Category $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
