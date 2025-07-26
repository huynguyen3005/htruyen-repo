<?php

namespace App\Presenters;

use App\Transformers\ChapterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ChapterPresenter.
 *
 * @package namespace App\Presenters;
 */
class ChapterPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ChapterTransformer();
    }
}
