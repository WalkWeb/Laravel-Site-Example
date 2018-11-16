@extends('layouts.app')

@section('title', $post->meta_title)
@section('meta_desc', $post->meta_desc)
@section('meta_key', $post->meta_key)

@section('content')
    <section class="experience section">
        <div class="section-inner">
                <h1>{{$post->title}}</h1>
                {!! $post->desc !!}
        </div>
    </section>
@endsection