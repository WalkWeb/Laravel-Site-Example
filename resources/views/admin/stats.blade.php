@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
            <section class="experience section">
                <div class="section-inner">
                    <p>Всего категорий: {{$categories_count ?? 0}}</p>
                    <p>Всего постов: {{$post_count ?? 0}}</p>
                </div>
            </section>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <section class="experience section">
                <div class="section-inner">
                    <div class="col-sm-6">
                        <a href="{{route('admin.category.create')}}" class="btn btn-block btn-default">Создать категорию</a>
                        <h4>Последние добавленные категории:</h4>
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
                                    <h4 class="list-group-item-heading">{{$category->title}}</h4>
                                    <p class="list-group-item-text">
                                        {{$category->posts()->count()}}
                                    </p>
                                </a>
                            @endforeach
                        @else
                            <p>Нет категорий</p>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.post.create')}}" class="btn btn-block btn-default">Создать пост</a>
                        <h4>Последние добавленные посты:</h4>
                        @if(!empty($posts))
                            @foreach($posts as $post)
                                <a href="{{route('admin.post.edit', $post)}}" class="list-group-item">
                                    <h4 class="list-group-item-heading">{{$post->title}}</h4>
                                    <p class="list-group-item-text">
                                        {{$post->category($post->category_id)['title']}}
                                    </p>
                                </a>
                            @endforeach
                        @else
                            <p>Нет постов</p>
                        @endif
                    </div>

                    <div style="width: 100%; clear: both;"></div>
                </div>
            </section>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <ul>
                <li><a href="{{route('clear-view')}}" target="_blank" title="">Очистить кэш вьюх</a></li>
                <li><a href="{{route('clear-config')}}" target="_blank" title="">Очистить кэш конфигов</a></li>
                <li><a href="{{route('clear-route')}}" target="_blank" title="">Очистить кэш роутингов</a></li>
            </ul>
        </div>
    </div>

@endsection