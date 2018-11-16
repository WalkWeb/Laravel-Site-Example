@extends('layouts.app')

@section('content')

        @forelse($posts as $post)
        <section class="experience section">
            <div class="section-inner">
                <h2 class="heading"><a href="{{route('post', $post->slug)}}">{{$post->title}}</a></h2>
                <div class="box-category">
                    <p style="margin-top: -30px; color: #999;">Новости</p>
                </div>
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
