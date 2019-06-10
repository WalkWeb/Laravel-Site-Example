<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Возвращает посты, связанные с категорией
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
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
