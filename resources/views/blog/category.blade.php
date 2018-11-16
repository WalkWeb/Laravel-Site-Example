@extends('layouts.app')

@section('title', $category->title)

@section('content')

    <section class="experience section">
        <div class="section-inner">
        @forelse($posts as $post)
            <h2><a href="{{route('post', $post->slug)}}">{{$post->title}}</a></h2>
            <p>{!! $post->desc_short !!}</p>

        @empty
            <h2 class="text-center">В данной категории нет постов</h2>
        @endforelse
        </div>
    </section>
    @if($posts) {{$posts->links()}} @endif

@endsection