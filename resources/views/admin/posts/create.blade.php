@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <section class="experience section">
            <div class="section-inner">
                <h2>Создание поста</h2>

                <form class="form-horizontal" action="{{route('admin.post.store')}}" method="post">
                    {{csrf_field()}}
                    @include('admin.posts.partials.form')
                </form>
            </div>
        </section>
    </div>

@endsection

