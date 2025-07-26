<?php

namespace App\Presenters;

use App\Transformers\ComicTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ComicPresenter.
 *
 * @package namespace App\Presenters;
 */
class ComicPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ComicTransformer();
    }
}
