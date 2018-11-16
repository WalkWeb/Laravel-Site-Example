@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <section class="experience section">
            <div class="section-inner">
                <h2>Создание категории</h2>

                <form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
                    {{csrf_field()}}
                    @include('admin.categories.partials.form')
                </form>
            </div>
        </section>
    </div>

@endsection

