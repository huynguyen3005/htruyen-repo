<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicOriginName extends Model
{
    use HasFactory;
    protected $table = 'comic_origin_name';

    protected $fillable = [
        'comic_id',
        'name',
    ];
}
