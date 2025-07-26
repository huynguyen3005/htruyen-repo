<?php

namespace App\Presenters;

use App\Transformers\ComicViewTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ComicViewPresenter.
 *
 * @package namespace App\Presenters;
 */
class ComicViewPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ComicViewTransformer();
    }
}
