@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
            <section class="experience section">
                <div class="section-inner">
                    <p>Всего категорий: {{$categories_count}}</p>
                    <p>Всего постов: {{$post_count}}</p>
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
                        @foreach($categories as $category)
                            <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{$category->title}}</h4>
                                <p class="list-group-item-text">
                                    {{$category->posts()->count()}}
                                </p>
                            </a>
                        @endforeach
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.post.create')}}" class="btn btn-block btn-default">Создать материал</a>
                        @foreach($posts as $post)
                            <a href="{{route('admin.post.edit', $post)}}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{$post->title}}</h4>
                                <p class="list-group-item-text">
                                    {{$post->categories()->pluck('title')->implode(', ')}}
                                </p>
                            </a>
                        @endforeach
                    </div>


                </div>
            </section>
        </div>
    </div>



@endsection