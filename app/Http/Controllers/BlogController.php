<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class BlogController extends Controller
{
    /**
     * Вывод информации о категории и постам в данной категории
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(int $id)
    {
        $category = Category::where('id', $id)->first();

        return view('blog.category', [
            'category' => $category,
            'posts' => $category->posts()->where('published', 1)->paginate(10),
        ]);
    }

    /**
     * Выводит информацию по посту
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(int $id)
    {
        return view('blog.post', [
            'post' => Post::find($id),
        ]);
    }
}
