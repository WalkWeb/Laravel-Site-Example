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
                                        {{$post->categories()->pluck('title')->implode(', ')}}
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



@endsection