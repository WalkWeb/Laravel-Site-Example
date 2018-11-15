<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class StatsController extends Controller
{
    /**
     * Отображает главную страницу админки, содержащую статистику по сайту
     */
    public function index()
    {
        return view('admin.stats', [
            'posts' => Post::lastPosts(5),
            'categories' => Category::lastCategories(5),
            'post_count' => Post::count(),
            'categories_count' => Category::count(),
        ]);
    }
}
