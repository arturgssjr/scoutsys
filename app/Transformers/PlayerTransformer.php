<?php

namespace scoutsys\Transformers;

use League\Fractal\TransformerAbstract;
use scoutsys\Models\Player;

/**
 * Class PlayerTransformer.
 *
 * @package namespace scoutsys\Transformers;
 */
class PlayerTransformer extends TransformerAbstract
{
    /**
     * Transform the Player entity.
     *
     * @param \scoutsys\Models\Player $model
     *
     * @return array
     */
    public function transform(Player $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
