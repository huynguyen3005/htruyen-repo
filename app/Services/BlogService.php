<?php

namespace App\Services;

use App\Repositories\Interfaces\BlogRepository;
use App\Repositories\Interfaces\ComicRepository;

/**
 * Class BlogService.
 */
class BlogService
{

    protected $repository;
    protected $comicRepository;
    public function __construct(BlogRepository $repository, ComicRepository $comicRepository)
    {
        $this->repository = $repository;
        $this->comicRepository = $comicRepository;
    }

    public function getNewestBlogs($limit = 3)
    {
        return $this->repository->getNewestBlogs($limit);
    }

    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    public function findBySlug($slug)
    {
        return $this->repository->findBySlug($slug);
    }

    public function search($keyword)
    {
        return $this->repository->search($keyword);
    }

    public function getMostViewedBlogs($slug = '')
    {
        return $this->repository->getMostViewedBlogs($slug); // get top blogs most views exclude current blog
    }
}
