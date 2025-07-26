<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ChapterRepository;
use App\Models\Chapter;
use App\Validators\ChapterValidator;

/**
 * Class ChapterRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ChapterRepositoryEloquent extends BaseRepository implements ChapterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chapter::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return ChapterValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findChapter($comic, $name)
    {
        return $this->model->where(['comic_id' => $comic, 'chapter_name' => $name])->first();
    }

}
