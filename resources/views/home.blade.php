@extends('layouts.app')

@section('title', 'Пример сайта на Laravel')

@section('content')

        @forelse($posts as $post)
        <section class="experience section">
            <div class="section-inner">
                <h2 class="heading"><a href="{{route('post', $post->id)}}">{{$post->title}}</a></h2>
                <div class="content">
                    {!! $post->desc_short !!}
                </div>
            </div>
        </section>
        @empty
            <section class="experience section">
                <div class="section-inner">
                    <div class="content">
                        <p>
                            На сайте нет материалов
                        </p>
                    </div>
                </div>
            </section>
        @endforelse
        @if($posts) {{$posts->links()}} @endif

@endsection
