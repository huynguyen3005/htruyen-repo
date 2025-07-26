<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\ComicView;

/**
 * Class ComicViewTransformer.
 *
 * @package namespace App\Transformers;
 */
class ComicViewTransformer extends TransformerAbstract
{
    /**
     * Transform the ComicView entity.
     *
     * @param \App\Models\ComicView $model
     *
     * @return array
     */
    public function transform(ComicView $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
