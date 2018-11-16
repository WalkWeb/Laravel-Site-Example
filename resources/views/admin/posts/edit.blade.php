@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <section class="experience section">
            <div class="section-inner">
                <h2>Редактирование поста</h2>

                <form class="form-horizontal" action="{{route('admin.post.update', $post)}}" method="post">

                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">
                    @include('admin.posts.partials.form')
                </form>
            </div>
        </section>
    </div>

@endsection

