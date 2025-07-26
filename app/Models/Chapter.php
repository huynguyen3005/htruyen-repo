<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Chapter.
 *
 * @package namespace App\Models;
 */
class Chapter extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comic_id',
        'title',
        'chapter_name',
        'chapter_title',
        'chapter_path',
        'release_at',
    ];

}
