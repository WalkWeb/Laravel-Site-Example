@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <section class="experience section">
            <div class="section-inner">
                <h2>Создание категории</h2>

                {!! Form::open(['url'=>route('admin.category.store'), 'class'=>'form-horizontal', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

                <form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
                    {{csrf_field()}}

                    <label for="published">Статус</label>
                    <select class="form-control" name="published" id="published">
                        <option value="1">Опубликовано</option>
                        <option value="0">Не опубликовано</option>
                    </select>

                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок категории" value="{{$category->title ?? ''}}" required>
                    <hr />

                    <input class="btn btn-primary" type="submit" value="Сохранить">
                {!! Form::close() !!}
            </div>
        </section>
    </div>

@endsection
