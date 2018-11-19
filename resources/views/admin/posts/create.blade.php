@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <section class="experience section">
            <div class="section-inner">
                <h2>Создание поста</h2>

                @if(count($categories) > 0)

                <form class="form-horizontal" action="{{route('admin.post.store')}}" method="post">
                    {{csrf_field()}}
                    @include('admin.posts.partials.form')
                </form>
                @else
                <p>На сайте нет категорий. Прежде, чем создавать пост, создайте хотя бы одну категорию</p>
                @endif


            </div>
        </section>
    </div>

@endsection

