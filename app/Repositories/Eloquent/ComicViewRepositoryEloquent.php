<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ComicViewRepository;
use App\Models\ComicView;
use App\Validators\ComicViewValidator;
use App\Repositories\Traits\RepositoryTraits;

/**
 * Class ComicViewRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ComicViewRepositoryEloquent extends BaseRepository implements ComicViewRepository
{
    use RepositoryTraits;
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model;
    public function model()
    {
        return ComicView::class;
    }

    protected function buildQuery($model, $filters)
    {
        $query = $model::query();

        foreach ($filters as $key => $value) {
            if (is_array($value)) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByComicId($comicId)
    {
        return $this->model->where('comic_id', $comicId)->first();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function getTopViewsDaily($limit = 6)
    {
        return $this->model->orderBy('views_daily', 'desc')->with('comic')->take($limit)->get();
    }

    public function getTopViewsWeekly($limit = 6)
    {
        return $this->model->orderBy('views_weekly', 'desc')->with('comic.latestChapter')->take($limit)->get();
    }

    public function getTopViewsMonthly($limit = 6)
    {
        return $this->model->orderBy('views_monthly', 'desc')->with('comic.latestChapter')->take($limit)->get();
    }

    public function topDay()
    {
        return $this->model->orderBy('views_daily', 'desc')->paginate(24);
    }

    public function topWeek()
    {
        return $this->model->orderBy('views_weekly', 'desc')->paginate(24);
    }

    public function topMonth()
    {
        return $this->model->orderBy('views_monthly', 'desc')->paginate(24);
    }

}
