<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property string|null $desc_short
 * @property string $desc
 * @property string|null $meta_title
 * @property string|null $meta_desc
 * @property string|null $meta_key
 * @property int|null $published
 * @property int $view
 * @property int $created_by
 * @property int|null $edit_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post lastPosts($count)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDescShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereEditBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereMetaDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereView($value)
 * @mixin \Eloquent
 */
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
