@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование поста @endslot
            @slot('parent') Главная @endslot
            @slot('active') Посты @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('admin.post.update', $post)}}" method="post">

            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.posts.partials.form')
        </form>
    </div>

@endsection

