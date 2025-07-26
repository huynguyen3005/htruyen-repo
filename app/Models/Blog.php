<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Blog.
 *
 * @package namespace App\Models;
 */
class Blog extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'author',
        'avatar_image',
        'slug',
        'view',
    ];

    public function author_info()
    {
        return $this->belongsTo(User::class, 'author', 'id')
            ->select('id', 'name', 'email', 'avatar');
    }

}
