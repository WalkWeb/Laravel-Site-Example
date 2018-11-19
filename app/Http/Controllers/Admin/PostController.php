<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Страница отображения информации о постах
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Страница с формой создания нового поста
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::where('published', 1)->get(),
        ]);
    }

    /**
     * Принимает post запрос созданного поста, сохраняет его в базу и переадресовывает на страницу со всеми постами
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|max:255',
            'desc_short' => 'required',
            'desc' => 'required',
            'meta_title' => 'required|max:255',
            'meta_desc' => 'max:255',
            'meta_key' => 'max:255',
            'published' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ], [
            'required' => 'Поле :attribute не заполнено',
            'unique' => 'Поле :attribute не уникально',
            'max' => 'Поле :attribute не может быть длиннее 255 символов',
            'exists' => 'Вы указали некорректное поле категории'
        ]);

        $data['created_by'] = Auth::id();

        Post::create($data);

        return redirect()->route('admin.post.index')->with('status', 'Пост успешно создан!');
    }

    /**
     * Страница редактирования поста
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::where('published', 1)->get(),
        ]);
    }

    /**
     * Принимает post-данные на обновление поста, обновляет его и переадресовывает на страницу со списком всех постов
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $this->validate($request, [
            'title' => 'required|max:255',
            'desc_short' => 'required',
            'desc' => 'required',
            'meta_title' => 'required|max:255',
            'meta_desc' => 'max:255',
            'meta_key' => 'max:255',
            'published' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ], [
            'required' => 'Поле :attribute не заполнено',
            'unique' => 'Поле :attribute не уникально',
            'max' => 'Поле :attribute не может быть длиннее 255 символов',
            'exists' => 'Вы указали некорректное поле категории'
        ]);

        $data['created_by'] = $post->created_by;
        $data['edit_by'] = Auth::id();

        $post->update($data);

        return redirect()->route('admin.post.index')->with('status', 'Пост успешно обновлен!');
    }

    /**
     * Удаляет пост
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
