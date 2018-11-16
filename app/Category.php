<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Category extends Model
{
    /**
     * Атрибуты, доступные для назначения
     * Альтернативный короткий вариант: protected $guarded = []
     *
     * @var array
     */
    protected $fillable = ['title', 'published'];

    /**
     * Отключаем метки времени - updated_at, created_at
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Указывает количество постов, связанных с категорией
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function posts()
    {
        //return $this->morphedByMany('App\Post', 'lk_post_to_category');
    }

    /**
     * Возвращает $count последних добавленных категорий
     *
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('id', 'desc')->take($count)->get();
    }



}
