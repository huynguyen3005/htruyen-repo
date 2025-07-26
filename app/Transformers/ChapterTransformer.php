<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Chapter;

/**
 * Class ChapterTransformer.
 *
 * @package namespace App\Transformers;
 */
class ChapterTransformer extends TransformerAbstract
{
    /**
     * Transform the Chapter entity.
     *
     * @param \App\Models\Chapter $model
     *
     * @return array
     */
    public function transform(Chapter $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
