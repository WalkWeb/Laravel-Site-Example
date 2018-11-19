<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

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

    /**
     * Возвращает название категории, по значению category_id у поста
     *
     * @param int $id
     * @return mixed
     */
    public function category(int $id)
    {
        return Category::find($id);
    }

}
