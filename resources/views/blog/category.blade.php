@extends('layouts.app')

@section('title', $category->title)

{{--@section('title')--}}
    {{--{{$category->title}}--}}
{{--@endsection--}}

@section('content')

    <div class="container">
    @forelse($posts as $post)
        <div class="row">
            <div class="col-sm-12">
                <h2><a href="{{route('post', $post->slug)}}">{{$post->title}}</a></h2>
                <p>{!! $post->desc_short !!}</p>
            </div>
        </div>
        {{$posts->links()}}
    @empty
        <h2 class="text-center">В данной категории нет постов</h2>
    @endforelse
    </div>


@endsection