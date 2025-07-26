<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Comic.
 *
 * @package namespace App\Models;
 */
class Comic extends Model implements Transformable
{
    use HasFactory, SoftDeletes, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comic_id',
        'name',
        'slug',
        'avatar_image',
        'author',
        'status',
        'description',
        'release_at',
        'views',
    ];


    public function originNames()
    {
        return $this->hasMany(ComicOriginName::class, 'comic_id', 'comic_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,          // Related Model 
            'comic_category',           // Intermediate table name
            'comic_id',       // Cột trong bảng trung gian liên kết với comics
            'category_id',    // Cột trong bảng trung gian liên kết với categories
            'id',                   // Khóa chính trong bảng comics được sử dụng
            'category_id'          // Khóa chính trong bảng categories được sử dụng
        );
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'comic_id', 'comic_id')
            ->select(['id', 'comic_id', 'chapter_name']);
    }

    public function latestChapter()
    {
        return $this->hasOne(Chapter::class, 'comic_id', 'comic_id')
            ->select(['id', 'comic_id', 'chapter_name'])
            ->orderBy('chapter_name', 'desc');
    }

    public function viewInMonth()
    {
        return $this->hasOne(ComicView::class, 'comic_id', 'comic_id')
            ->select(['id', 'comic_id', 'views_monthly']);
    }

}
