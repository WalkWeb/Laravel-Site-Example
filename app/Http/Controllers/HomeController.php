<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Главная страница
     *
     * @return View
     */
    public function index(): View
    {
        $post = new Post();

        return view('home', [
            'posts' => $post->where('published', 1)->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
