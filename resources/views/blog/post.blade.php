@extends('layouts.app')

@section('title', $post->meta_title)
@section('meta_desc', $post->meta_desc)
@section('meta_key', $post->meta_key)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{$post->title}}</h1>
                {!! $post->desc !!}
            </div>
        </div>
    </div>
@endsection