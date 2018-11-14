@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание поста @endslot
            @slot('parent') Главная @endslot
            @slot('active') Посты @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('admin.post.store')}}" method="post">
            {{csrf_field()}}
            @include('admin.posts.partials.form')
        </form>
    </div>

@endsection

