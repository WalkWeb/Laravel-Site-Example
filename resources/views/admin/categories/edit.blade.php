@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <section class="experience section">
            <div class="section-inner">
                <h2>Редактирование категории</h2>

                <form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">
                    @include('admin.categories.partials.form')
                </form>
            </div>
        </section>
    </div>

@endsection

