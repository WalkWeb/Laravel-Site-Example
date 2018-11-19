<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    /**
     * Атрибуты, доступные для назначения
     *
     * @var array
     */
    protected $fillable = [
        'title', 'category_id', 'desc_short', 'desc', 'meta_title',
        'meta_desc', 'meta_key', 'published', 'created_by', 'edit_by'
    ];

    /**
     * Задает автора поста
     */
    public function setCreatedAttribute()
    {
        $this->attributes['created_by'] = Auth::id();
    }

    /**
     *
     */
    public function categories()
    {
        //return $this->morphToMany('App\Category', 'lk_post_to_category');
    }

    /**
     * Scope - отображать только опубликованные посты
     *
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    /**
     * Scope - сортировка по дате, с конца, и только последние $count записей
     *
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeLastPosts($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }



}
