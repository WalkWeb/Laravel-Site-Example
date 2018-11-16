<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    /**
     * Главная страница
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'posts' => Post::where('published', 1)->orderBy('created_at', 'desc')->paginate(10),
            ]);
    }
}
