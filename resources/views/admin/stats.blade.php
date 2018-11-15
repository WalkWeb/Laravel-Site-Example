@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Категорий: {{$categories_count}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Постов: {{$post_count}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">###</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">###</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
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
    </div>



@endsection