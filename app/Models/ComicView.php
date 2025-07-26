<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComicView extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'comic_id',
        'views_daily',
        'views_weekly',
        'views_monthly',
    ];

    public function comic()
    {
        return $this->belongsTo(Comic::class, 'comic_id', 'comic_id')
            ->select(['comic_id', 'name', 'slug', 'avatar_image']);
        ;
    }
}
