<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ComicRepository;
use App\Models\Comic;
use App\Repositories\Traits\RepositoryTraits;
use App\Validators\ComicValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class ComicRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ComicRepositoryEloquent extends BaseRepository implements ComicRepository
{
    use RepositoryTraits;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comic::class;
    }

    public function buildQuery($model, $filters)
    {
        $query = $this->model::query();

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
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return ComicValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getById($id)
    {
        return $this->model->where('comic_id', $id)->first();
    }
    // get list comics
    public function getComics($filters = [])
    {
        return $this->model->with('latestChapter')->orderByDesc('updated_at')->paginate(24);
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->with('categories', 'originNames', 'chapters', 'latestChapter')->first();
    }

    // get information about the comic by slug with only chapters relationship
    public function getAAttrBySlug($slug)
    {
        return $this->model->where('slug', $slug)->with('chapters')->first();
    }

    public function updateDesciption($slug, $description)
    {
        return $this->model->where('slug', $slug)->update(['description' => $description, 'updated_at' => DB::raw('updated_at')]);
    }


    public function getRecentlyUpdate()
    {
        return $this->model->orderBy('updated_at', 'desc')->with('latestChapter')->take(24)->get();
    }

    public function search($keyword, $genres, $status, $sortby)
    {
        if (!empty($genres)) {
            // Tìm kiếm trong bảng comics
            $comicIds = DB::table('comic_category')
                ->select('comic_id')
                ->whereIn('category_id', $genres)
                ->groupBy('comic_id')
                ->havingRaw('COUNT(DISTINCT category_id) = ?', [count($genres)])
                ->pluck('comic_id');
            $comics = $this->model->whereIn('id', $comicIds);

        } else {
            $comicsQuery = $this->model->select('comics.*')
                ->where('comics.name', 'like', '%' . $keyword . '%');

            // Tìm kiếm trong bảng comic_origin_name và lấy comic_id
            $originNamesQuery = DB::table('comic_origin_name')
                ->select('comic_origin_name.comic_id')
                ->where('comic_origin_name.name', 'like', value: '%' . $keyword . '%');

            // Kết hợp kết quả từ cả hai truy vấn
            $comics = $comicsQuery->union(
                $this->model->newQuery()
                    ->select('comics.*')
                    ->joinSub($originNamesQuery, 'origin_names', function ($join) {
                        $join->on('comics.comic_id', '=', 'origin_names.comic_id');
                    })
            );
        }
        // // Lấy danh sách truyện theo điều kiện trên
        if (!empty($status)) {
            $comics = $this->model->newQuery()
                ->fromSub($comics, 'combined_results')
                ->withTrashed(); // ignore a soft delete

            $comics = $comics->where('status', $status);
        }

        if (!empty($sortby)) {
            // Tùy chỉnh trật tưng theo thứ tự sắp xếp
            switch ($sortby) {
                case 'byupdated':
                    $comics = $comics->orderBy('updated_at', 'desc');
                    break;
                case 'byreleased':
                    $comics = $comics->orderBy('created_at', 'desc');
                    break;
                case 'byviews':
                    $comics = $comics->orderBy('views', 'desc');
                    break;
                default:
                    $comics = $comics->orderBy('updated_at', 'desc');
                    break;
            }
        }

        $comics = $comics->with('categories', 'latestChapter');
        $comics = $comics->paginate(24)->withQueryString();
        return $comics;
    }

    // get comics by list comic_id
    public function getComicsByIds($comicIds)
    {
        return $this->model->whereIn('comic_id', $comicIds)->with('latestChapter')->paginate(24);
    }

    // get top views
    public function topViews()
    {
        return $this->model->orderBy('views', 'desc')->with('latestChapter')->paginate(24);
    }

    public function recentCompleted()
    {
        return $this->model->orderBy('updated_at', 'desc')->where('status', 'completed')->with('latestChapter')->take(6)->get();
    }

    public function getListComic($Ids)
    {
        $IdsString = "'" . implode("','", $Ids) . "'";

        return $this->model->whereIn('comic_id', $Ids)
            ->with('latestChapter')
            ->orderByRaw("FIELD(comic_id, $IdsString)")
            ->paginate(6);
    }
}
