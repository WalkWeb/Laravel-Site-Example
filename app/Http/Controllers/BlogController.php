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
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category' => $category,
            'posts' => $category->posts()->where('published', 1)->paginate(10),
        ]);
    }

    /**
     * Выводит информацию по посту
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post($slug)
    {
        return view('blog.post', [
            'post' => Post::where('slug', $slug)->first(),
        ]);
    }
}
