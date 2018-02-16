<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Profile;

/**
 * Class ProfileTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class ProfileTransformer extends TransformerAbstract
{
    /**
     * Transform the Profile entity.
     *
     * @param \scoutsys\Models\Profile $model
     *
     * @return array
     */
    public function transform(Profile $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
