<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Comic;

/**
 * Class ComicTransformer.
 *
 * @package namespace App\Transformers;
 */
class ComicTransformer extends TransformerAbstract
{
    /**
     * Transform the Comic entity.
     *
     * @param \App\Models\Comic $model
     *
     * @return array
     */
    public function transform(Comic $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
