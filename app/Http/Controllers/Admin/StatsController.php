<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatsController extends Controller
{
    /**
     * Отображает главную страницу админки, содержащую статистику по сайту
     */
    public function index()
    {
        return view('admin.stats');
    }
}
