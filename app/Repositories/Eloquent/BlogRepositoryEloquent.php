<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\BlogRepository;
use App\Models\Blog;
use App\Validators\BlogValidator;

/**
 * Class BlogRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class BlogRepositoryEloquent extends BaseRepository implements BlogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Blog::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getNewestBlogs($limit)
    {
        return $this->model->orderBy('created_at', 'desc')->with('author_info')->paginate($limit);
    }

    public function findById($id)
    {
        return $this->model->with('author_info')->findOrFail($id);
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->with('author_info')->firstOrFail();
    }

    public function search($keyword)
    {
        return $this->model->where('title', 'LIKE', '%' . $keyword . '%')
            ->with('author_info')
            ->paginate(24);
    }

    // get top blogs most views exclude current blog
    public function getMostViewedBlogs($slug)
    {
        return $this->model->where('slug', '!=', $slug)->orderBy('views', 'desc')->take(3)->get();
    }
}
